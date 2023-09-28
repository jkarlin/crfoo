/**
 * Script executes in DOM and creates a SharedWorker.
 */

const addWorkerBtn = document.getElementById('add-shared-worker');
const checkCookieBtn = document.getElementById('check-shared-worker-cookies');

let worker;

addWorkerBtn.addEventListener('click', () => {
  const worker = new SharedWorker('/cookies/v2/shared-worker.js');
  worker.port.onmessage = event => {
    console.log(event.data);
  };
  worker.port.start();
});

checkCookieBtn.addEventListener('click', () => {
  if (!worker) {
    console.log('First create the SharedWorker');
    return;
  }
  worker.port.postMessage({});
});
