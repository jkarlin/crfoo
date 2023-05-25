<?php
header('Content-type: application/signed-exchange;v=b3');
header('X-Content-Type-Options: nosniff');
readfile('bid3.sxg');
?>
