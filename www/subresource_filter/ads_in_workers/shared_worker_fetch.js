onconnect = function(e) {
  var port = e.ports[0];
  var src = '../social-engineering-ad1.png?from_shared_worker&/adservices.';
  fetch(src).then((response) => {
    response.blob().then((r) => port.postMessage(r));
  },
  _ => port.postMessage(new Blob()));
}
