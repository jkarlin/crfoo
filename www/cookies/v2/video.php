<?php

$file = "static/bananas.mp4"

if (file_exists($file)) {
    header("Content-Description: File Transfer");
    header("Content-Type: video/mp4");
    header("Content-Length: " . filesize($file));
    header("Content-Security-Policy: sandbox");
    readfile($file);
    exit;  
} else {
    http_response_code(404);
}

?>
