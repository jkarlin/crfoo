// self.addEventListener("fetch", event => {
//    if (event.request.url.indexOf("/yao/service_worker/test1.html") != -1) {
//      event.respondWith(fetch(event.request));
//    }
// });

fetch("/yao/service_worker/test1.html").then(response => {
    console.log("Response:", response);
}).catch(err => {
    console.error("Error while fetching:", err);
});
