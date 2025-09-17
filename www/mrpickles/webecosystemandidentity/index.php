<?php
$tracking_id = "bouncetracking-" . rand();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>webecosystemandidentity.com</title>
  </head>
  <body>
    <script>
      const serverId = "<?php echo $tracking_id ?>";
      let trackingId = localStorage.getItem("tracking_id");
      if (trackingId === null) {
        trackingId = serverId;
        localStorage.setItem("tracking_id", serverId);
      }
      window.location.replace(`https://privacysandbox.com/news/privacy-sandbox-next-steps/?tracking_id=${trackingId}`);
    </script>
  </body>
</html>
