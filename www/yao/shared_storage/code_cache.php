<?php
$path = 'large-script.js';
header('Content-Type: application/javascript');
header("Cache-Control: max-age=2592000");
readfile($path);
?>
