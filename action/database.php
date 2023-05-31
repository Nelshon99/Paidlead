<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "paidlead";


try{

    $conn = new PDO("mysql:host=$server;dbname=$database;",$username,$password);

} catch(PDOExcection $e){
    die('conexion fallida ' . $e->getMessage());
}


?>