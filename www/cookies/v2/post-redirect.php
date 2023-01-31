<?php
header('Access-Control-Allow-Origin: *');
if ($_SERVER['REQUEST_METHOD'] === 'POST' ||
    $_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
  header(
      'Location', $_POST['location'] . '?cookie=' . getallheaders()['Cookie']);
  http_response_code(200);
} else {
  http_response_code(404);
}
?>
