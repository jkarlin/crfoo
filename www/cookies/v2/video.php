<?php
try {
    $file = 'bananas.mp4'
    if (file_exists($file)) {
        echo 'File does exist'
        // header('Content-Description: File Transfer');
        // header('Content-Type: video/mp4');
        // header('Content-Length: ' . filesize($file));
        // header('Content-Security-Policy: sandbox');
        // readfile($file);
        // http_response_code(200);
    } else {
        // http_response_code(404);
        echo 'File does not exist'
    }
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), '\n';
}
?>
