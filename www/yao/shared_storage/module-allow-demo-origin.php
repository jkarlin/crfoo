<?php
$path = 'demo-module.js';
header("Access-Control-Allow-Origin: https://shared-storage-cross-origin-worklet-demo.glitch.me");
header("Shared-Storage-Cross-Origin-Worklet-Allowed: ?1");
header('Content-Type: application/javascript');
readfile($path);
