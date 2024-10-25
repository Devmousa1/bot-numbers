<?php

// Fetch the JSON data from the URL and decode it into an associative array
$data = json_decode(file_get_contents("https://5sim.biz/v1/guest/prices?country=vietnam&product=telegram"), true);

// Check if data is successfully fetched and decoded
if ($data !== null) {
    // Print the data for debugging
    print($data);
} else {
    echo "Failed to retrieve or decode JSON data.";
}

?>
