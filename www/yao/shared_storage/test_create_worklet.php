<?php
header('Content-Type: text/html; charset=utf-8');
header('Cross-Origin-Opener-Policy: same-origin');
header('Cross-Origin-Embedder-Policy: require-corp');
?>
<!DOCTYPE html>
<html lang="en">
  <body>
    <script>
      function appendIframe(src) {
        const iframe = document.createElement("iframe");
        iframe.src = src;
        document.body.appendChild(iframe);
      }
      
      async function createWorklet(src) {
        const worklet = await sharedStorage.createWorklet(src, { credentials: "include" });
      }

      async function registerServiceWorker(src) {
        const registration = await navigator.serviceWorker.register(src);
      }
    </script>

    <button onclick="createWorklet('https://cr.kungfoo.net/yao/shared_storage/module.js')">createWorklet() same-origin</button><br>
    <button onclick="appendIframe('https://cr.kungfoo.net/yao/shared_storage/iframe.html')">appendChild() same-origin</button><br>
    <button onclick="createWorklet('https://ss-create-worklet.glitch.me/module.js')">createWorklet() cross-origin</button><br>
    <button onclick="appendIframe('https://ss-create-worklet.glitch.me/iframe.html')">appendChild() cross-origin</button><br>
    
    <button onclick="registerServiceWorker('https://cr.kungfoo.net/yao/shared_storage/sw.js')">registerServiceWorker()</button><br>

  </body>
</html>
