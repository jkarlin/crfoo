<?php
try {
    $file = 'bananas.mp4';
    if (file_exists($file)) {
        header('Content-Description: File Transfer');
        header('Content-Type: video/mp4');
        header('Content-Length: ' . filesize($file));
        header('Content-Security-Policy: sandbox allow-scripts');
        header('Cache-Control: no-cache, must-revalidate');
        http_response_code(200);
        readfile($file);
    } else {
        http_response_code(404);
        echo 'File does not exist\n';
    }
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), '\n';
}
?>
