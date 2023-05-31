<?php 

include "../configuracion/database.php";


$id_cliente = $_POST["id"];
$nombre_asesor  = $_POST["nombre_asesor"];
$telefono = $_POST["telefono"];
$email = $_POST["email"];
$password = $_POST["password"];



if($password  == null){

    $actualizar_cliente = $conn->prepare("UPDATE administrador SET  nombre_asesor = '$nombre_asesor', telefono = '$telefono',  email = '$email'  WHERE id='$id_cliente'");
    $actualizar_cliente->execute(); 
}else{
    $contraseña2 = password_hash($password, PASSWORD_BCRYPT);
$actualizar_cliente = $conn->prepare("UPDATE administrador SET  nombre_asesor = '$nombre_asesor', telefono = '$telefono',  email = '$email', password = '$contraseña2'  WHERE id='$id_cliente'");
$actualizar_cliente->execute(); 
}



header("location: ../Perfil.php");


?>