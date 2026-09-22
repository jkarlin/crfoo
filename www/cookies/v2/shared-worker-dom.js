/**
 * Script executes in DOM and creates a SharedWorker.
 */

{

const addWorkerBtn = document.getElementById('add-shared-worker');
const addWorkerStorageAccessBtn =
    document.getElementById('add-shared-worker-storage-access');
const checkCookieBtn = document.getElementById('check-shared-worker-cookies');

let worker;

function setupWorker(w) {
  worker = w;
  worker.port.onmessage = event => {
    if (!event.data?.ok) {
      console.log('Something went wrong!');
    } else {
      console.log(event.data);
    }
  };
  worker.port.start();
}

addWorkerBtn.addEventListener('click', () => {
  setupWorker(new SharedWorker('/cookies/v2/shared-worker.js'));
});

addWorkerStorageAccessBtn?.addEventListener('click', async () => {
  try {
    const handle = await document.requestStorageAccess({SharedWorker: true});
    setupWorker(handle.SharedWorker('/cookies/v2/shared-worker.js'));
  } catch (err) {
    console.error(err);
  }
});

checkCookieBtn.addEventListener('click', () => {
  if (!worker) {
    console.log('First create the SharedWorker');
    return;
  }
  worker.port.postMessage({});
});

}
