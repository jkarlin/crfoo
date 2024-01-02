<?php
header("Access-Control-Allow-Origin: *");
?>
<!DOCTYPE html>
<meta charset="utf-8">
<button id="set-cookie">Set cookie</button>
<button id="set-cookie-from-cache">Set cookie from cache</button>
<div>document.cookie is <span id="document-cookie"></span></div>
<button id="clear-cookies">Clear cookies</button>
<script>
  
document.getElementById('set-cookie').addEventListener('click', () => 
  fetch(`cammie/cookies/set-cookie.php`).catch(console.error));
document.getElementById('set-cookie-from-cache').addEventListener('click', () => 
  fetch(`cammie/cookies/set-cookie.php`, {cache: 'only-if-cached'}).catch(console.error));
document.getElementById('clear-cookies').addEventListener('click', () => {
  fetch('cammie/cookies/clear-site-data.php').catch(console.error);
});

setInterval(() => {
  document.getElementById('document-cookie').textContent = document.cookie;
}, 100);

</script>
