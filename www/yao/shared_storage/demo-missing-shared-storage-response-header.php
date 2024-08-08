<?php
$path = 'demo-module.js';
header("Access-Control-Allow-Origin: https://shared-storage-cross-origin-worklet-demo.glitch.me");
header('Content-Type: application/javascript');
readfile($path);
