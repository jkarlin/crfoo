self.addEventListener("fetch", event => {
  if (event.request.url.indexOf("/yao/service_worker/test1.html") != -1) {
    event.respondWith(fetch(event.request));
  }
});
