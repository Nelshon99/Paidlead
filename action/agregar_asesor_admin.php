<?php 

include "../configuracion/database.php";


$nombre_asesor  = $_POST["nombre_asesor"];
$telefono = $_POST["telefono"];
$email = $_POST["email"];
$password = $_POST["password"];
$admin = $_POST["admin"];
$contraseña2 = password_hash($password, PASSWORD_BCRYPT);




    $agregar_asesor = $conn->prepare("INSERT  INTO administrador  (nombre_asesor,telefono,email,password,admin) VALUE ('$nombre_asesor','$telefono','$email','$contraseña2','$admin')");
    $agregar_asesor->execute(); 



header("location: ../administradores.php");


?>