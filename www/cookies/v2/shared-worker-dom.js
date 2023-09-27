/**
 * Script executes in DOM and creates a SharedWorker.
 */

const addWorkerBtn = document.getElementById('add-shared-worker');


addWorkerBtn.addEventListener('click', () => {
  const worker = new SharedWorker('/cookies/v2/shared-worker.js');
  worker.port.onmessage = event => {
    console.log(event);
  };
  worker.port.start();
  worker.port.postMessage('ping');
});
