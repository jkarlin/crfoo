<?php
$path = 'simple.html';
header("Access-Control-Allow-Origin: *");
header('Content-Type: text/html; charset=utf-8');
header('Set-Cookie: qweasd=abc123; SameSite=None');
readfile($path);
