<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Disable OPcache if the function exists
if (function_exists('ini_set')) {
    ini_set('opcache.enable', '0');
}

// Define the base directory for includes
define('BASE_DIR', __DIR__ . '/car_parts/');

// Include the connect.php file if it exists
$connectFile = BASE_DIR . 'connect.php';
if (file_exists($connectFile)) {
    include $connectFile;
} else {
    die("Error: The file 'connect.php' does not exist in the specified directory.");
}

// Check if a specific file is requested
if (isset($_GET['file'])) {
    $requestedFile = basename($_GET['file']); // Sanitize input
    $fileToInclude = BASE_DIR . $requestedFile;

    // Ensure it's a valid PHP file
    if (file_exists($fileToInclude) && pathinfo($fileToInclude, PATHINFO_EXTENSION) === 'php') {
        include $fileToInclude;
    } else {
        die("Error: The file '$requestedFile' does not exist.");
    }
} else {
    // Default output or homepage
    echo "Index file loaded successfully.";
}
?>