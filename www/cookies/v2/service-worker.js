/**
 * Service worker script executes in the worker.
 */

importScripts('./service-worker-import-script.js');

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

let cookieChangeEventCount = 0;
let mostRecentChanges;

const orEmptyArr = obj => (obj || []);

self.addEventListener('cookiechange', ev => {
  ++cookieChangeEventCount;
  mostRecentChanges = [...orEmptyArr(ev.changed), ...orEmptyArr(ev.deleted)];
});

let port;

self.addEventListener('message', event => {
  if (!port) {
    port = event.ports[0];
  }
  port.postMessage({
    cookieChangeEventCount,
    mostRecentChanges: mostRecentChanges ? JSON.stringify(mostRecentChanges) : '[]',
  });
});

self.addEventListener('fetch', event => {
  console.log('Fetch event', event);
});
