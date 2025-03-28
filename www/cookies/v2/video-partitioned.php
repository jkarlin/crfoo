<?php
try {
    header('Content-Type: video/mp4');
    header('Content-Description: File Transfer');
    header('Cache-Control: no-cache, must-revalidate');
    header('Content-Security-Policy: sandbox allow-scripts');
    $file = 'bananas.mp4';
    $partitioned_cookie_name = '__Host-3P_partitioned';
    if (!isset($_COOKIE[$partitioned_cookie_name])) {
        http_response_code(401);
        echo 'No cookie!\n';
    } elseif (file_exists($file)) {
        header('Content-Length: ' . filesize($file));
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
