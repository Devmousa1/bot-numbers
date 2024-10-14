<?php

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Define the folder structure
$folders = [
    'data',
    'EMIL',
    'EMILS',
    'BUY',
    'assignment',
];

// Create a zip file
$zip = new ZipArchive();
$zipFilename = 'all_content.zip';

if ($zip->open($zipFilename, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== TRUE) {
    die("Could not open archive");
}

// Add folders and their contents to the zip file
foreach ($folders as $folder) {
    // Use recursion to add all files and subdirectories
    addFolderToZip($folder, $zip);
}

// Close the zip file
$zip->close();

// Set headers for download
header('Content-Type: application/zip');
header('Content-Disposition: attachment; filename=' . basename($zipFilename));
header('Content-Length: ' . filesize($zipFilename));
readfile($zipFilename);

// Clean up the zip file after download
unlink($zipFilename);
exit();

// Function to recursively add folders and files to the zip
function addFolderToZip($folder, $zipArchive, $zipPath = '') {
    // Get the current folder path for the zip
    $currentZipPath = rtrim($zipPath . '/' . basename($folder), '/');

    // Add the folder itself to the zip
    $zipArchive->addEmptyDir($currentZipPath);

    // Scan the directory and add files
    $files = scandir($folder);
    foreach ($files as $file) {
        if ($file === '.' || $file === '..') {
            continue; // Skip current and parent directories
        }
        $filePath = "$folder/$file";
        if (is_dir($filePath)) {
            // Recursive call for subdirectories
            addFolderToZip($filePath, $zipArchive, $currentZipPath);
        } else {
            // Add files to the zip
            $zipArchive->addFile($filePath, "$currentZipPath/$file");
        }
    }
}
