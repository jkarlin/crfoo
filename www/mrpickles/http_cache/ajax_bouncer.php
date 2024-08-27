<?php
$referer = $_SERVER["HTTP_REFERER"] ?? $_GET["bounce_host"] ?? "";
$referer = "'" . addslashes($referer) . "'"
?>
<!DOCTYPE html>
<html>
  <head>
    <title>AJAX Bounce Tracker</title>
  </head>
  <body>
    <p>This page does an AJAX request for an ETag tracking ID and then client-side redirects back based on the <code>referer</code> header.</p>
    <p>You should not be seeing this page if all is going as expected.</p>
    <br />
    <p><a href="index.html">Back to home page.</a></p>
    <?php echo "<script>const referer = $referer;</script>"; ?>
    <script>
      fetch('ajax.php')
        .then(res => res.text())
        .then(body => {
          const url = new URL(referer);
          url.searchParams.set('tracking_id', body);
          url.searchParams.set('tracking_host', window.location.host);
          url.searchParams.set('bounce_host', referer);
          window.location.replace(url.toString());
        });
    </script>
  </body>
</html>
