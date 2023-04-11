/**
 * Service worker script executes in the worker.
 */

self.addEventListener('activate', event => {
  event.waitUntil((async () => {
    const subscriptions = await self.registration.cookies.getSubscriptions();
    await self.registration.cookies.unsubscribe(subscriptions);

    await self.registration.cookies.subscribe([{url: self.registration.scope}]);
  })());
});

self.addEventListener('cookiechange', ev => console.log('Cookie change detected', ev));
