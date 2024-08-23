<?php
$etag = "random-" . rand();

header("Cache-Control: max-age=10");
header("ETag: $etag");
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Random ETag</title>
  </head>
  <body>
    <p>This page has a random ETag and a TTL of 10 seconds.</p>
    <p>It will always have a cache hit within the TTL. And then it will get a new ETag.</p>
    <p>The ETag is <code><?php echo $etag; ?></code>.</p>
    <br />
    <p><a href="etag_random.php">Try again.</a></p>
    <p><a href="index.html">Back to home page.</a></p>
  </body>
</html>
