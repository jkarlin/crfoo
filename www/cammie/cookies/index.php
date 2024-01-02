<?php
header('Origin-Trial: Ai9tuLs6oePbb8wGl0/CwIcLxDaTQwKf6gGHicjWjvnkLSjmD+4s2KZ/icjDLx/OWb9ql0KXmTXhjbO8m4Q2HAkAAABbeyJvcmlnaW4iOiJodHRwczovL2NyMi5rdW5nZm9vLm5ldDo0NDMiLCJmZWF0dXJlIjoiUGFydGl0aW9uZWRDb29raWVzIiwiZXhwaXJ5IjoxNjU1MjUxMTk5fQ==');
header('Accept-CH: Sec-CH-Partitioned-Cookies');
header("Access-Control-Allow-Origin: *");
?>
<!DOCTYPE html>
<meta charset="utf-8">
<meta http-equiv="origin-trial" content="Ai9tuLs6oePbb8wGl0/CwIcLxDaTQwKf6gGHicjWjvnkLSjmD+4s2KZ/icjDLx/OWb9ql0KXmTXhjbO8m4Q2HAkAAABbeyJvcmlnaW4iOiJodHRwczovL2NyMi5rdW5nZm9vLm5ldDo0NDMiLCJmZWF0dXJlIjoiUGFydGl0aW9uZWRDb29raWVzIiwiZXhwaXJ5IjoxNjU1MjUxMTk5fQ==">
<button id="set-cookie">Set cookie</button>
<button id="set-cookie-from-cache">Set cookie from cache</button>
<div>document.cookie is <span id="document-cookie"></span></div>
<button id="clear-cookies">Clear cookies</button>
<script>
  
document.getElementById('set-cookie').addEventListener('click', () => 
  fetch(`set-cookie.php`).catch(console.error));
document.getElementById('set-cookie-from-cache').addEventListener('click', () => 
  fetch(`set-cookie.php`, {cache: 'only-if-cached'}).catch(console.error));
document.getElementById('clear-cookies').addEventListener('click', () => {
  fetch('clear-site-data.php').catch(console.error);
});

setInterval(() => {
  document.getElementById('document-cookie').textContent = document.cookie;
}, 100);

</script>
