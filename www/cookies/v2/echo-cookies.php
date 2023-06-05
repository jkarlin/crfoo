<?php
header('Content-Type: application/json');
$data = ['cookies' => getallheaders()['Cookie']];
$json = json_encode($data);
if ($json === false) {
    $json = json_encode(["jsonError" => json_last_error_msg()]);
    if ($json === false) {
        $json = '{"jsonError":"unknown"}';
    }
    http_response_code(500);
} else {
    http_response_code(200);
}
echo $json;
?>
