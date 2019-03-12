<?php
$path = 'test.pdf';

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/pdf');
header('Content-Disposition: inline; filename='.$path);
header('Content-Transfer-Encoding: binary');
header('Accept-Ranges: bytes');

readfile($path);