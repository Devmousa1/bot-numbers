<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ob_start();
// Fetch the JSON data from the URL and decode it into an associative array
$data = json_decode(file_get_contents("https://5sim.biz/v1/guest/prices?country=poland&product=telegram"), true);

$price = $data['poland']['telegram']['orange']['cost'];
// $add = $data['vietnam']['106']['count'];

// Check if data is successfully fetched and decoded
if ($data !== null) {
    print_r( $price);
    // Print the data for debugging
    // print_r($data);
} else {
    echo "Failed to retrieve or decode JSON data.";
}

?>
