<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ob_start();
$app='tg';
$site='5sim';
$country='15';
$operator='106';
// Fetch the JSON data from the URL and decode it into an associative array
$data = json_decode(file_get_contents("https://5sim.biz/v1/guest/prices?country=poland&product=telegram"), true);
$api_price = json_decode(file_get_contents("https://blank-susy-mousa2-8a6a78ce.koyeb.app//api-sites.php?action=getPrice&site=$site&country=$country&app=$app&operator=$operator"), 1);
$price = $data['poland']['telegram']['orange']['cost'];
// $add = $data['vietnam']['106']['count'];
echo "https://blank-susy-mousa2-8a6a78ce.koyeb.app//api-sites.php?action=getPrice&site=$site&country=$country&app=$app&operator=$operator";
// Check if data is successfully fetched and decoded
if ($data !== null) {
    print_r( $api_price);
    // Print the data for debugging
    // print_r($data);
} else {
    echo "Failed to retrieve or decode JSON data.";
}

?>
