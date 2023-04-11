<?php
header('Set-Cookie: __Host-navigation=foobar; Secure; Path=/; SameSite=None; Partitioned; Max-Age=86400');
?>
<!DOCTYPE html>
<meta charset="utf-8">
<div>document.cookie is <span id="document-cookie"></span></div>
<script>

setInterval(() => {
  document.getElementById('document-cookie').textContent = document.cookie;
}, 100);

</script>
