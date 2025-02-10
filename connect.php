<?php
$dsn = "mysql:host=sql313.infinityfree.com;dbname=if0_38165496_car_parts";
$user = "if0_38165496";
$pass = "730371745ye";
$options = [
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8",
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
];

try {
    // Create a new PDO instance
    $con = new PDO($dsn, $user, $pass, $options);
    // echo "Database connection successful!";  // Connection test message
    
    // CORS headers
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    header("Access-Control-Allow-Methods: POST, OPTIONS, GET");

    // Include additional files
    include BASE_DIR . 'functions.php';

    if (!isset($notAuth)) {
        // Uncomment when you have an authentication function
        // checkAuthenticate();
    }
} catch (PDOException $e) {
    // Display error in HTML format
    echo "<html>
            <head>
                <title>Error</title>
                <style>
                    body { font-family: Arial, sans-serif; margin: 20px; }
                    .error { color: red; border: 1px solid red; padding: 15px; background-color: #fdd; }
                </style>
            </head>
            <body>
                <h1>An error occurred</h1>
                <div class='error'>" . htmlspecialchars($e->getMessage()) . "</div>
            </body>
          </html>";
    exit; // Stop further execution after an error
}
?>