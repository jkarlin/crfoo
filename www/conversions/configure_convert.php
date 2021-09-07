<?php
$query = http_build_query(array(
  'trigger-data' => $_GET['trigger-data'],
  'event-source-trigger-data' => $_GET['event-source-trigger-data'],
  'priority' => $_GET['priority'],
  'dedup-key' => $_GET['dedup-key'],
));

header('Location: /.well-known/attribution-reporting/trigger-attribution?' . $query);
exit;
?>
