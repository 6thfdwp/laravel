$(document).ready(function() {
	console.info('connecting to node server');
	var socket = io.connect('http://localhost:3000');
	socket.on('auth.login', function(data) {
		console.info(data);
	});
});