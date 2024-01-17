<?php
header('Content-Type: text/html');
header('Cache-Control: no-cache, must-revalidate');
header('Content-Security-Policy: sandbox allow-scripts');
?>
<!DOCTYPE html>
<!-- Copy of index.html at 6c341af0dc2d7cee8bab654ef4248ac6171444bc -->
<meta charset="utf-8">
<button id="set-cookie">Set cookie (SameSite=None)</button>
<button id="same-site-cookie">Set SameSite cookie (SameSite=Lax)</button>
<button id="set-partitioned-cookie">Set partitioned cookie (SameSite=None; Partitioned)</button>
<div>document.cookie is <span id="document-cookie"></span></div>
<button id="clear-cookies">Clear cookies</button>
<button id="clear-storage">Clear storage</button>
<button id="clear-both">Clear both</button>
<div id="service-worker-root">
  <div id="service-worker-status"></div>
  <button id="register-service-worker">Register Service Worker</button>
  <button id="unregister-service-worker">Unregister Service Worker</button>
  <button id="check-service-worker-cookies">Check Service Worker cookies</button>
  <br><br>
  <button id="service-worker-query-count">Get number of change events</button>
  <div><span id="service-worker-count">0</span> cookie change events.</div>
  <div>Last change: <span id="service-worker-change"></span></div>
  <br>
  <button id="add-shared-worker">Add SharedWorker</button>
  <button id="check-shared-worker-cookies">Check SharedWorker cookies</button>
  <br>
  <button id="add-dedicated-worker">Add Worker</button>
  <button id="check-dedicated-worker-cookies">Check Worker cookies</button>
  <br>
  <button id="basic-auth">HTTP Basic Auth</button>
</div>
<script>

for (const [id, endpoint] of [
    ['set-cookie', 'samesitenone'],
    ['set-partitioned-cookie', 'partitioned-3p'],
    ['clear-both', 'clear-site-data'],
    ['clear-cookies', 'clear-site-data-cookies'],
    ['clear-storage', 'clear-site-data-storage'],
    ['basic-auth', 'basic-auth'],
    ['same-site-cookie', 'samesitelax'],
]) {
  document.getElementById(id).addEventListener(
      'click', () => fetch(`/cookies/v2/${endpoint}.php`).catch(console.error));
}

setInterval(() => {
  document.getElementById('document-cookie').textContent = document.cookie;
}, 100);

</script>
<script src="/cookies/v2/service-worker-dom.js"></script>
<script src="/cookies/v2/shared-worker-dom.js"></script>
<script src="/cookies/v2/dedicated-worker-dom.js"></script>
