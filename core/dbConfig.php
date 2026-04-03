<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "rock_concert_db"; // Must match the database name in your schema.sql
$dsn = "mysql:host={$host};dbname={$dbname}";

try {
    
    $pdo = new PDO($dsn, $user, $password);
    
    $pdo->exec("SET time_zone = '+08:00';");
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
