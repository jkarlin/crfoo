self.addEventListener("fetch", event => {
    var requestURL = new URL(event.request.url);
    if (requestURL.pathname.startsWith("/yao/service_worker/test1.html")) {
      var freshResource = fetch(event.request).then(function (response) {
          return response;
      });
      event.respondWith(freshResource);
    }
});
