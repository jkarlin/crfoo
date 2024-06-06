<?php
$path = 'module.js';
header("Access-Control-Allow-Origin: *");
header("Shared-Storage-Cross-Origin-Worklet-Allowed: ?1");
header('Content-Type: application/javascript');
readfile($path);
