<?php
$path = 'plugin.html';
header('Content-Type: text/html');
header('Content-Transfer-Encoding: binary');
header('Accept-Ranges: bytes');
header('Content-Security-Policy: sandbox allow-same-origin allow-forms allow-scripts allow-top-navigation allow-popups allow-pointer-lock allow-orientation-lock allow-popups-to-escape-sandbox allow-modals allow-presentation allow-top-navigation-by-user-activation allow-downloads-without-user-activation');
readfile($path);
