<?php
header('Content-Type: application/json');
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Pragma: no-cache');
header('Expires: 0');
header('Access-Control-Allow-Origin: chrome-extension://bknnlbamapndemiekhkcnmdclnkijlhb');
header('Access-Control-Allow-Credentials: true');
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
