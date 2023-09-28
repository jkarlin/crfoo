/**
 * Service worker script executes in the worker.
 */

importScripts('./worker-import-script.js');

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

self.addEventListener('message', async event => {
  const [port] = event.ports;
  if (event.data?.type == 'cookiechange') {
    port.postMessage({
      cookieChangeEventCount,
      mostRecentChanges: mostRecentChanges ? JSON.stringify(mostRecentChanges) : '[]',
    });
  }
  if (event.data?.type == 'testfetch') {
    const msg = {};
    try {
      const res = await fetch('/cookies/v2/echo-cookies.php');
      const {cookies} = await res.json();
      msg.ok = true;
      msg.cookies = cookies;
    } catch (error) {
      msg.ok = false;
    } finally {
      port.postMessage(msg);
    }
  }
});
