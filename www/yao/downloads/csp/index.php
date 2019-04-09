<?php
$path = 'index.html';
header('Content-Type: text/html');
header('Content-Transfer-Encoding: binary');
header('Accept-Ranges: bytes');
header('Content-Security-Policy: sandbox allow-scripts');
readfile($path);
