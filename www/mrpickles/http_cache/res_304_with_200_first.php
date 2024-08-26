<?php
$etag = "deadbeef";
$preexisting_etag = $_SERVER["HTTP_IF_NONE_MATCH"] ?? "";
$res_code = 200;

if (!empty($preexisting_etag)) {
  $res_code = 304;
  header("Location: res_304_with_200_first.html", TRUE, $res_code);
}
header("Cache-Control: no-cache");
header("ETag: $etag");
?>
<!DOCTYPE html>
<html>
  <head>
    <title>This page 304's after an initial 200</title>
  </head>
  <body>
    <p>This page gives a 200 with an ETag. Subsequent requests will give a 304.</p>
    <p>After the initial ETag is set, future requests will send the ETag.<p>
    <p>However, the client will not care about the response payload if the status code is 304.</p>
    <p>For example, this is the status code that PHP rendered: <code><?php echo $res_code; ?></code>. Does it match with devtools?</p>
    <br />
    <p>Notice how if a page always 304's then nothing happens.</p>
    <p>Even if the response has an ETag, subsequent requests will not send anything.<p>
    <p>So it seems that the client straight up ignores any response payloads from 304's.</p>
    <p><a href="res_304_always_304.php">Clicking this link makes a request that always 304. Nothing really happens.</a></p>
    <br />
    <p><a href="res_304_with_200_first.php">Try again.</a></p>
    <p><a href="index.html">Back to home page.</a></p>
  </body>
</html>
