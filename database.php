<?php
$host = "localhost:3306";
$user = "root";
$pass = "";
$db = "winkel database";

try {
    $pdo = new PDO( "mysql:host = $host;dbname=$db", $user, $pass);
    echo "Connected to database (winkel database).";
} catch (PDOException $e) {
    echo "error: " . $e->getMessage();
}


?>