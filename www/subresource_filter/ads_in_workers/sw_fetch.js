self.addEventListener('install', function(e) {
});

function fakeRequest(url) {
  return fetch(url).then(function(r) {
    return r.blob().then(function(blob) {
      return new Promise((resolve, reject) => {
        resolve(new Response(blob));
      });
    });
  });
}

self.addEventListener('fetch', function(e) {
  if (e.request.url.endsWith("?sw")) {
    e.respondWith(fakeRequest("../social-engineering-ad1.png?from_sw"));
  }
});
