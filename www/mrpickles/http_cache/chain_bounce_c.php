<?php
header("Cache-Control: max-age=10");
header("ETag: deadbeef");
header("Location: chain_bounce_d.php", TRUE, 302);
?>
<html>a</html>
