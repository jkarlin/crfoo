<?php
header('Content-Type: text/html');
header('Cache-Control: no-cache, must-revalidate');
header('Content-Security-Policy: sandbox allow-scripts allow-same-site-none-cookies');

?>
<!DOCTYPE html>
<!-- Copy of index.html at 6c341af0dc2d7cee8bab654ef4248ac6171444bc -->
<meta charset="utf-8">
<button id="set-cookie">Set cookie (SameSite=None)</button>
<button id="same-site-cookie">[Sandboxed, Filtered out in NetworkService] Set SameSite cookie (SameSite=Lax)</button>
<button id="set-partitioned-cookie">Set partitioned cookie (SameSite=None; Partitioned)</button>
<div>[Sandboxed, Not indicative of cookie inclusion, check DevTools] document.cookie is <span id="document-cookie"></span></div>
  <button id="clear-cookies">Clear cookies</button>
  <button id="clear-storage">Clear storage</button>
  <button id="clear-both">Clear both</button>
</div>
<div> Iframes for testing:
  <ol>
      <li> sandboxed with the allow-same-site-none-cookies value directly, <iframe id="sandboxed-iframe" src="/cookies/v2/csp-page2.php" sandbox="allow-scripts allow-same-site-none-cookies"></iframe> </li>
      <li> not directly sandboxed, should inherit parent policy, <iframe id="sandboxed-iframe2" src="/cookies/v2/csp-page2.php"></iframe> </li>
      <li> cross-site iframe that should not inherit the sandboxing allow <iframe id="cross-site-iframe" src="https://organized-hypnotic-bongo.glitch.me/"></iframe> </li>
  </ol>
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
      'click', () => fetch(`/cookies/v2/${endpoint}.php`, {credentials: 'include'}).catch(console.error));
}

const id = setInterval(() => {
  try {
    document.getElementById('document-cookie').textContent = document.cookie;
  } catch (err) {
    clearInterval(id);
  }
}, 100);

</script>
<script src="/cookies/v2/service-worker-dom.js"></script>
<script src="/cookies/v2/shared-worker-dom.js"></script>
<script src="/cookies/v2/dedicated-worker-dom.js"></script>
