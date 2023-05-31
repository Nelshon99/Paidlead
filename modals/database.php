<?php

$server = "localhost";
$username = "uvmprchenk1ag";
$password = "O13v511}k31n";
$database = "db7j54y8bq7hjp";


try{

    $conn = new PDO("mysql:host=$server;dbname=$database;",$username,$password);

} catch(PDOExcection $e){
    die('conexion fallida ' . $e->getMessage());
}


?>