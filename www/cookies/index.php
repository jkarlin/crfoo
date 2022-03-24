<?php
header('Origin-Trial: Ai9tuLs6oePbb8wGl0/CwIcLxDaTQwKf6gGHicjWjvnkLSjmD+4s2KZ/icjDLx/OWb9ql0KXmTXhjbO8m4Q2HAkAAABbeyJvcmlnaW4iOiJodHRwczovL2NyMi5rdW5nZm9vLm5ldDo0NDMiLCJmZWF0dXJlIjoiUGFydGl0aW9uZWRDb29raWVzIiwiZXhwaXJ5IjoxNjU1MjUxMTk5fQ==');
header('Accept-CH: Sec-CH-Partitioned-Cookies');
?>
<!DOCTYPE html>
<meta charset="utf-8">
<meta http-equiv="origin-trial" content="Ai9tuLs6oePbb8wGl0/CwIcLxDaTQwKf6gGHicjWjvnkLSjmD+4s2KZ/icjDLx/OWb9ql0KXmTXhjbO8m4Q2HAkAAABbeyJvcmlnaW4iOiJodHRwczovL2NyMi5rdW5nZm9vLm5ldDo0NDMiLCJmZWF0dXJlIjoiUGFydGl0aW9uZWRDb29raWVzIiwiZXhwaXJ5IjoxNjU1MjUxMTk5fQ==">
<button id="set-cookie">Set cookie (SameSite=None)</button>
<button id="set-partitioned-cookie">Set partitioned cookie (SameSite=None; Partitioned)</button>
<div>document.cookie is <span id="document-cookie"></span></div>
<button id="clear-cookies">Clear cookies</button>
<script>

for (const [id, endpoint] of [
  ['set-cookie', 'samesitenone-1p'],
  ['set-partitioned-cookie', 'partitioned-1p'],
]) {
  document.getElementById(id).addEventListener(
      'click', () => fetch(`/cookies/${endpoint}.php`).catch(console.error));
}

setInterval(() => {
  document.getElementById('document-cookie').textContent = document.cookie;
}, 100);

document.getElementById('clear-cookies').addEventListener('click', () => {
  fetch('/cookies/clear-site-data-1p.php').catch(console.error);
});

</script>
