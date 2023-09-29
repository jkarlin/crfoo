/**
 * Script executes in DOM and creates a Dedicated Worker.
 */

{

const addWorkerBtn = document.getElementById('add-dedicated-worker');
const checkCookieBtn = document.getElementById('check-dedicated-worker-cookies');

let worker;

addWorkerBtn.addEventListener('click', () => {
  worker = new Worker('/cookies/v2/dedicated-worker.js');
  worker.onmessage = event => {
    if (!event.data?.ok) {
      console.log('Something went wrong!');
    } else {
      console.log(event.data);
    }
  };
});

checkCookieBtn.addEventListener('click', () => {
  if (!worker) {
    console.log('First create the SharedWorker');
    return;
  }
  worker.postMessage({});
});

}
