<?php
header("Cache-Control: max-age=10");
header("ETag: deadbeef");
header("Location: chain_bounce_c.php", TRUE, 301);
?>
<html>a</html>
