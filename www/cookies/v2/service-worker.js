/**
 * Service worker script executes in the worker.
 */

self.addEventListener('install', event => {
  event.waitUntil(self.skipWaiting()); // Activate worker immediately
});

self.addEventListener('activate', event => {
  event.waitUntil((async () => {
    await self.clients.claim();
    const subscriptions = await self.registration.cookies.getSubscriptions();
    await self.registration.cookies.unsubscribe(subscriptions);

    await self.registration.cookies.subscribe([{url: self.registration.scope}]);

    console.log('Listening for cookie change events...');
  })());
});

let curChangeCount = 0;

self.addEventListener('cookiechange', () => {
  console.log('Cookie change event received');
  ++curChangeCount;
});

let port;

self.addEventListener('message', event => {
  if (!port) {
    port = event.ports[0];
  }
  port.postMessage({payload: curChangeCount});
  curChangeCount = 0;
});
