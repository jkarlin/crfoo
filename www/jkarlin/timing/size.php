<?php
header("Cache-Control: no-store");
header("Content-Type: text/html");
$size = $_GET['size'];

if ($size > 1024*1024*50) {
  echo "Request too large! Please keep it <= 50MB";
} else {
  echo str_pad("a", $size, 'a');
}
?>
