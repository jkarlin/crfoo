<?php
$file = 'bananas.mp4'
try {
    if (file_exists($file)) {
        header('Content-Description: File Transfer');
        header('Content-Type: video/mp4');
        header('Content-Length: ' . filesize($file));
        header('Content-Security-Policy: sandbox');
        readfile($file);
        http_response_code(200);
    } else {
        http_response_code(404);
    }
} catch (Exception $e) {
    http_response_code(500);
    echo 'Caught exception: ',  $e->getMessage(), '\n';
}
?>
