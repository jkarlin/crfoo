<?php
$path = 'module.js';
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/javascript');
readfile($path);
