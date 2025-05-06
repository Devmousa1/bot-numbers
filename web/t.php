<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ob_start();
$app='telegram';
$site='5sim';
$country='15';
$operator='any';
$zx = 'any';
$fali = array("no free phones", "not enough user balance", "not enough rating", "select country", "select operator", "bad country", "bad operator", "no product", "server offline", "internal error");
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://5sim.biz/v1/user/buy/activation/$zx/$operator/$app");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

$api_key = 'eyJhbGciOiJSUzUxMiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE3NTkzNzIwODUsImlhdCI6MTcyNzgzNjA4NSwicmF5IjoiNTRhZDcxNDdmYzJlNWU4YjhmNmE0ZjA0ODllYzdjYzUiLCJzdWIiOjI3ODgwNDB9.tRkg_wSFGnC-EMlTEUQGkmrnij9MtMXWzWlN9te2jn5UNbFhu4tvyTjj8-P1Znw1vB3FXUq4Mc-0Dwtz2M6pQfruYHsdiIwlEXB-M0KuljenYuw96DZ6Ez0N3HtMxZi7t_58P55_me5cu4xqEgj8HmHLWSEzrLeQrHRg2EuGh8fAshch8thHzilJfqCzERyhxZ4l-lWcnw0VowvRoq3YwdXel_z24KWhlhOiJz2QTaKFWY_EF5VBw0i2VEoqOPddoW-q4k7_QsT-6SErO7sDfSFpapZjgQk6BC_Yl4xiMg88eTvREPObPSUer5AeVshAtz9v2N4x4Wb6qXLa5dRhEg';
$headers = array();
$headers[] = 'Authorization: Bearer ' . $api_key;
$headers[] = 'Accept: application/json';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
print_r( $result);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);
$no = $result;
$api = json_decode($result, 1);
$idnumber = $api['id'];
$number = $api['phone'];
echo $number;
if (in_array($no, $fali)) {
    $number = $number;
} else {
    $number = null;
}
if ($number == null) {
    $status = 0;
} else {
    $status = 200;
}
$v = $api['expires'];
$ex_time = explode(":", $v);
$v = $ex_time[1];
$x = $api['created_at'];
$ex_time = explode(":", $x);
$x = $ex_time[1];
if ($v > $x) {
    $t = $v - $x;
    $time = 60 * $t;
} else {
    $t = 60 - $x + $v;
    $time = 60 * $t;
}
$Location  = "5sim.biz";

print_r( $result);