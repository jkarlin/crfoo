self.addEventListener('sync', function(sync_event) {
  postErrorToClients("Pong!");
});

function postErrorToClients(err) {
  clients.matchAll({includeUncontrolled: true})
  .then(clientList => {
     clientList.forEach(client => client.postMessage(err.message));
  });
}
