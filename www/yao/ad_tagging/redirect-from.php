<?php
$path = 'prebid9.js';
header('Content-Type: application/javascript');
readfile($path);
