<?php
header('Set-Cookie: __Host-navigation=foobar; Secure; Path=/; SameSite=None; Partitioned; Max-Age=86400');
header('Origin-Trial: Ai9tuLs6oePbb8wGl0/CwIcLxDaTQwKf6gGHicjWjvnkLSjmD+4s2KZ/icjDLx/OWb9ql0KXmTXhjbO8m4Q2HAkAAABbeyJvcmlnaW4iOiJodHRwczovL2NyMi5rdW5nZm9vLm5ldDo0NDMiLCJmZWF0dXJlIjoiUGFydGl0aW9uZWRDb29raWVzIiwiZXhwaXJ5IjoxNjU1MjUxMTk5fQ==');
?>
<!DOCTYPE html>
<meta charset="utf-8">
<div>document.cookie is <span id="document-cookie"></span></div>
<script>

setInterval(() => {
  document.getElementById('document-cookie').textContent = document.cookie;
}, 100);

</script>
