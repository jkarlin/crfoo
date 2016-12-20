self.addEventListener('sync', (evt) => {
  console.log('SW sync event fired, event tag: ' + evt.tag);
  if (evt.tag == 'send_client_status_reports') {
      evt.waitUntil(sendClientReports());
  }
});
navigator.connection.addEventListener('typechange', networkChangeHandler);

function networkChangeHandler() {
    console.log('register for sending on sync event');
    console.log('network type is ' + navigator.connection.type);
    // If we're online the event should fire immediately
    self.registration.sync.register('send_client_status_reports').then(() => {
        console.log('sync registration success');
    }).catch(e => {
        console.log('sync registation failed, error: ' + e);
    });
 }

function sendClientReports() {
  // This should really be a POST or something but just download something instead.
  return new Promise(
          function(resolve, reject) {
            fetch('https://cr.kungfoo.net/jkarlin/timing/size.php?size=1').then(() => {
              console.log('sync download succeeded');
              resolve();
            }).catch(e => {
              console.log('sync download failed');
              reject();
            });
        });
}
