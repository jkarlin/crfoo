<?php
$etag = "deadbeef";

header("Cache-Control: max-age=10");
header("ETag: $etag");
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Static ETag</title>
  </head>
  <body>
    <p>This page has a static ETag and a TTL of 10 seconds.</p>
    <p>Hence it will always have a cache hit (within the TTL), even if the file changes.</p>
    <p>The ETag is <code><?php echo $etag; ?></code>.</p>
    <br />
    <p><a href="etag_static.php">Try again.</a></p>
    <p><a href="index.html">Back to home page.</a></p>
  </body>
</html>
