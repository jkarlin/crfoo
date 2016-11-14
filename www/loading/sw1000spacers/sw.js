'use strict';

self.addEventListener('fetch', function(event) {
  event.respondWith(fetch(request));
})
