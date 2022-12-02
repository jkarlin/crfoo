'use strict';

self.addEventListener("install", () => {
    self.skipWaiting();
});

self.addEventListener("message", async (e) => {
    let clients = await self.clients.matchAll({ includeUncontrolled: true, type: "window" });
    clients[0].navigate("https://www.learningcontainer.com/wp-content/uploads/2020/05/sample-zip-file.zip");
});
