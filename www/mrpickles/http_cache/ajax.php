<?php
$preexisting_etag = $_SERVER["HTTP_IF_NONE_MATCH"] ?? "";
$render_time = date("M-j-Y g:i:s A", time());

$etag = $preexisting_etag;
if (empty($etag)) {
  $etag = base64_encode($render_time);
}

header("Access-Control-Allow-Origin: *");
header("Cache-Control: no-cache");
header("ETag: $etag");

echo $etag;
?>
