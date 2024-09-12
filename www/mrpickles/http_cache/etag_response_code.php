<?php
$preexisting_etag = $_SERVER["HTTP_IF_NONE_MATCH"] ?? "";
$render_time = date("M j Y g:i:s A", time());
$status_code = $_GET["status"] ?? "";
$status_codes = $_GET["statuses"] ?? "";

if (empty($status_code)) {
  $response_codes = explode(',', $status_codes);
  // Resort to a hard-coded list if there are fewer than 2 possible status codes.
  if (count($response_codes) < 2) {
    $response_codes = array(200, 206, 301, 302, 404);
  }
  $status_code = $response_codes[array_rand($response_codes)];
}

$etag = $preexisting_etag;
if (empty($etag)) {
  $etag = "This ETag was originally generated at $render_time with status code $status_code.";
}

header("Cache-Control: no-cache");
header("ETag: $etag");
http_response_code($status_code);
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Basic ETag tracking</title>
  </head>
  <body>
    <?php if (empty($preexisting_etag)): ?>
      <p>Welcome! The request to this page did not send <code>If-None-Match</code> headers.</p>
      <p>Try visiting this page again and seeing what happens.</p>
    <?php else: ?>
      <p>Welcome back! The request to this page sent the following as the <code>If-None-Match</code> headers:</p>
      <p><code><?php echo $etag; ?></code></p>
    <?php endif; ?>
    <br />
    <p>This page demos ETag behavior based on the HTTP response from the original page request. (See <a href="https://github.com/whatwg/fetch/issues/1770">this GitHub issue</a> for more context.)</p>
    <p>This page was generated by PHP at <code><?php echo $render_time; ?></code> with status code <code><?php echo $status_code; ?></code>.</p>
    <br />
    <p>You can use the <code>status</code> query parameter (e.g. <code>?status=206</code>) to control the status code of the response. (If you don't specify a query param, this page will randomly send a 200, 206, 301, 302, or 404 status code.)</p>
    <p>I put a few common ones below as links for convenience:</p>
    <ul>
      <li><a href="etag_response_code.php?status=200">200</a></li>
      <li><a href="etag_response_code.php?status=202">202</a></li>
      <li><a href="etag_response_code.php?status=206">206</a></li>
      <li><a href="etag_response_code.php?status=301">301</a></li>
      <li><a href="etag_response_code.php?status=302">302</a></li>
      <li><a href="etag_response_code.php?status=404">404</a></li>
      <li><a href="etag_response_code.php?status=404">418</a></li>
      <li><a href="etag_response_code.php?status=500">500</a></li>
    </ul>
    <br />
    <p>You can alternatively specify the <code>statuses</code> query parameter to control the possible status codes (and their distribution). The server will randomly select from the list. (E.g. <code>?statuses=200,200,200,202,400,401,401,500</code>.)</p>
    <p>If you use that the above parameter, please include at least two or more items.</p>
    <br />
    <p><a href="etag_response_code.php">Try again (without query params).</a></p>
    <p><a href="index.html">Back to home page.</a></p>
  </body>
</html>