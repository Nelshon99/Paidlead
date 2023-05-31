<?php
//DB details
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'paidlead';

//Create connection and select DB
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("No hay Conexion con la base de datos: " . $conn->connect_error);
} 
?>