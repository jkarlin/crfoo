<?php
$preexisting_etag = $_SERVER["HTTP_IF_NONE_MATCH"] ?? "";
$render_time = date("M-j-Y g:i:s A", time());

$etag = $preexisting_etag;
if (empty($etag)) {
  $etag = $render_time;
}

header("Cache-Control: no-cache");
header("ETag: $etag");
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Basic ETag tracking</title>
  </head>
  <body>
    <?php if (empty($preexisting_etag)): ?>
      <p>Welcome! This is probably your first time visiting this page. Try refreshing and seeing what happens.</p>
    <?php else: ?>
      <p>Welcome back! Information from the HTTP cache suggests that your original visit to this page was on <code><?php echo $etag; ?></code>.</p>
    <?php endif; ?>
    <br />
    <p>This page uses the ETag to persist data outside of cookies.</p>
    <p>This page was generated at <code><?php echo $render_time; ?></code>.</p>
    <p>If you inspect the headers, you'll notice that caching is actually disabled. But the ETag gets passed anyway!</p>
    <br />
    <p><a href="/basic_etag_tracking.php">Try again.</a></p>
    <p><a href="/">Back to home page.</a></p>
  </body>
</html>
