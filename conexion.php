<?php
$host = "localhost";
$dbname = "DDBB";
$username = "root";
$password = "";


try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
   
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); 
} catch (PDOException $e) {

    die("Error al conectarse a la base de datos: " . $e->getMessage());
}


?>