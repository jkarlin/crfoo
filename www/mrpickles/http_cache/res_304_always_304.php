<?php
$etag = "deadbeef";

header("Location: res_304_always_304.php", TRUE, 304);
header("Cache-Control: no-cache");
header("ETag: $etag");
?>
<!DOCTYPE html>
<html>
  <head>
    <title>304 redirect</title>
  </head>
  <body>
    <p>You're not going to see this.</p>
  </body>
</html>
