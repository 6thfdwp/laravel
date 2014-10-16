var express = require('express')
 ,  app = express()
 ,  server = require('http').createServer(app)
 ,  io = require('socket.io').listen(server) //{origins: 'http://local.laraveldemo:*'}
 ,  redis = require('redis')
 ,  _ = require('underscore');
const redisClient = redis.createClient();

var loginUsers = {};
var sockets = {};

//io.origins('http://local.laraveldemo:*');
app.configure(function() {
	app.set('port', process.env.OPENSHIFT_NODEJS_PORT || 3000);
  	app.set('ipaddr', process.env.OPENSHIFT_NODEJS_IP || "127.0.0.1");
	//app.use(express.static(__dirname + '/public'));
});
app.use(function(req, res, next) {
    console.info(req.headers.host);
    //res.setHeader('Access-Control-Allow-Origin', "http://"+req.headers.host+':3000');
    res.setHeader('Access-Control-Allow-Origin', '*');
    res.setHeader('Access-Control-Allow-Headers', 'X-Requested-With,content-type');
    res.setHeader('Access-Control-Allow-Credentials', true);
    next();    
});

server.listen(app.get('port'), app.get('ipaddr'), function() {
	console.log('socket server powered by express listening at the port %d', app.get('port'));
});

// subscribe redis published message from laravel app (running in web server)
// when the node server first started
redisClient.subscribe('auth.login');
redisClient.on('message', function(channel, data) {
     var u = JSON.parse(data);
     loginUsers[u.id] = u;
     //console.info(u.email + ' received from redis');
     //every login (connected) client will be notified through channel
     io.sockets.emit(channel, data);
});

io.use(function(socket, next) {
    var handshakeData = socket.request;
    var userid = handshakeData._query['clientUserId'];
    var email = handshakeData._query['email'];
    sockets[userid] = socket;
    console.info('map the user ' + email + ' with socket ' + socket.id);
    next();
});
io.sockets.on('connection', function(socket) {
	console.info(socket.id + ' connected');
    
    // tell the new client all other connected users
    socket.emit('online_users', loginUsers);

    // when one user sends message to another
    socket.on('my_chat', function(data) {
        //io.sockets.socket();
        var to = data.to;
        console.info('forwarding the msg to recipient with id:' + to);
        var sender = loginUsers[data.from];
        sockets[to].emit('new_msg', {msg:data.msg, from:sender});
    });
});
