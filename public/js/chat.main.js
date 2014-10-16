$(document).ready(function() {
    //var socket = io.connect('http://local.laraveldemo:3000');
    console.info('connecting to node server with user id:' + me.id);
    var socket = io.connect('http://127.0.0.1:3000', {query: 'clientUserId='+me.id+ '&email='+me.email});

    var users = window.users = {}
    , withWho = null;

    // node server receive the message published by redis
    // when some users log in
	socket.on('auth.login', function(data) {
        var user = $.parseJSON(data)
        users[user.id] = user;
		//console.info(users);
        join_user(user);
	});
    // when node server confirm the connection
    socket.on('connect', function() {
        console.info('successfully establish a connection with node server');
    });
    socket.on('online_users', function(data) {
        console.info('receiving current online users');
        for (userid in data) {
            users[userid] = data[userid];
            join_user(data[userid]);
        }
    });

    // when receive new message sent to me from other user
    socket.on('new_msg', function(data) {
        var sender = data.from;
        console.info(sender);
        console.info('receive from:' + sender.first_name + ' ' + data.msg);
    });

    // select a use to chat with
    $('#sidebar').on('click', 'li', function(e) {
        var userid = $(this).data('userid');
        console.info('chat with user:' + userid);
        withWho = users[userid];
        $('.panel-heading .glyphicon-comment').text(function(idx, otext) {
            return 'Chat with ' + withWho.email;
        });
    });
    
    // send by pressing Enter
    $('btn-input').on('keypress', function(e) {
        if ( key = 13) {
            send(data);
        }
    });
    // send by clicking button
    $('#btn-chat').on('click', function(e) {
        var msg = $('#btn-input').val();
        var data = {msg: msg, to: withWho.id, from: me.id};
        //send(JSON.stringfy(data));
        send(data);
    });

    var join_user = function(user) {
        var el = $('<li><a href="#">' + user.first_name + '</a></li>')
                  .data('userid', user.id);
        $('#sidebar').append(el)
    };
    var send = function(data) {
        socket.emit('my_chat', data);
    };
    
    var appendMsg = function(data) {
        var el = $('<li>');
    }
});
