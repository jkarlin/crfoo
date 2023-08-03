debugger;

const allPorts = [];

onconnect = function(e) {
  var port = e.ports[0];
  allPorts.push(port);

  port.addEventListener('message', function(e) {
    var message = e.data[0];
    allPorts.forEach(port => {
      port.postMessage(message);
    })
  });

  port.start();
}
