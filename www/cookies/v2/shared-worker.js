/**
 * SharedWorker script executes in the worker.
 */

self.onconnect = ev => {
  const [port] = ev.ports;
  port.addEventListener('message', () => {
    port.postMessage('pong');
  });
  port.start();
};
