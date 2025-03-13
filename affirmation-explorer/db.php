<?php
require __DIR__ . '/vendor/autoload.php'; // Composer autoload for .env

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$host = $_ENV['DB_HOST'] ;  
$dbname = $_ENV['DB_NAME'] ;
$user = $_ENV['DB_USER'] ;
$pass = $_ENV['DB_PASS'] ;  

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

   // echo "✅ Connected successfully!";
} catch (PDOException $e) {
    echo "❌ Connection failed: " . $e->getMessage(); // Show error message for debugging
    error_log($e->getMessage()); // Log error instead of displaying it
    http_response_code(500);
    echo "Database connection failed. Please try again later.";
    exit;
}
?>
