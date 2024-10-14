<!-- Database Configuration Code -->
<?php  

$host = "localhost"; // Database host
$user = "root"; // Database username
$password = ""; // Database password (make sure this is correct)
$dbname = "threetwo"; // Database name

try {
    // Data Source Name (DSN) with UTF-8 charset for better compatibility
    $dsn = "mysql:host={$host};dbname={$dbname};charset=utf8mb4"; 
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Set error mode to exception
} catch (PDOException $e) {
    // Display connection error message
    die("Connection failed: " . $e->getMessage()); 
}

?>
