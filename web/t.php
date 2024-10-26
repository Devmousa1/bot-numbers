<?php

// Fetch the JSON data from the URL and decode it into an associative array
$data = json_decode(file_get_contents("https://5sim.biz/v1/guest/prices?country=vietnam&product=telegram"), true);
$adds = $data["vietnam"]["telegram"]["virtual6"]['count'];
$price = $data["vietnam"]["telegram"]['virtual6']['cost'];
$adds = $data["vietnam"]["telegram"]["virtual16"]['count'];
$price = $data["vietnam"]["telegram"]['virtual16']['cost'];
// Check if data is successfully fetched and decoded
if ($data !== null) {
    // Print the data for debugging
    print($price);
} else {
    echo "Failed to retrieve or decode JSON data.";
}

?>
