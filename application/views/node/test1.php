<script src="http://festivalify.se:1337/socket.io/socket.io.js"></script>
<script>
  var socket = io.connect('http://festivalify.se:1337');
  socket.on('news', function (data) {
    console.log(data);
    socket.emit('my other event', { my: 'data' });
  });
</script>