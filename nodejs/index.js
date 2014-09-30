var server = require('http').createServer();
var io = require('socket.io')(server);
var redis = require('redis');
const rdiclient = redis.createClient();

var port = process.env.PORT || 3000;
server.listen(port, function() {
	console.log('socket.io server listening at the port %d', port);
});

// subscribe redis published message from laravel app (running in web server)
// when the node server first started
rdiclient.subscribe('auth.login');
rdiclient.on('message', function(channel, data) {
	console.info(data);
	// every login (connected) client will be notified through channel
	// client.emit(channel, data);
	io.sockets.emit(channel, data);
});

io.on('connection', function(client) {
	console.info(client.id + ' connected');

	
});