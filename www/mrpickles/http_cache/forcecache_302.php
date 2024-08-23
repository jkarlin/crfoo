<?php
header("Cache-Control: max-age=10");
header("ETag: deadbeef");
header("Location: forcecache_302.html", TRUE, 302);
?>
