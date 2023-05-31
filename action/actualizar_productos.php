<?php 

include '../configuracion/database.php';


$id_producto = $_POST["id_producto"];
$categoria = $_POST["categoria"];
$nombre =   $_POST["nombre"];
$precio =  $_POST["precio"];
$cantidad_stcok = $_POST["cantidad_stcok"];
$descripcion = $_POST["descripcion"];
$codigo_barra = $_POST["codigo_barra"];
$estado = $_POST["estado"];
 $foto_producto = $_FILES["foto_producto"]["name"];

/* actualizamos los datos del producto en la tabla PORDUCTOS */ 

if($foto_producto == null){
$actualizar_producto = 
$conn->prepare("UPDATE productos 
SET categoria = '$categoria' , nombre = '$nombre' ,precio = '$precio', stock = '$cantidad_stcok ', descripcion = '$descripcion', codigo_barra = '$codigo_barra', estado='$estado'
WHERE id = '$id_producto'");
$actualizar_producto->execute();

}else{

 
$actualizar_producto = $conn->prepare("UPDATE productos 
  SET categoria = '$categoria' , nombre = '$nombre' ,precio = '$precio', stock = '$cantidad_stcok ', descripcion = '$descripcion', codigo_barra = '$codigo_barra' , foto_producto = '$foto_producto',estado='$estado' 
  WHERE id = '$id_producto'");
  $actualizar_producto->execute();
}




if($actualizar_producto == null){
$tipo_alerta = "error";
$mensaje = "Hubo un error al actualizar el producto";
}else{
  $tipo_alerta = "success";
  $mensaje = "Porducto actualizado correctamente."; 
}



echo "

<script>

Swal.fire({
    position: 'top-end',
    icon: '$tipo_alerta',
    title: '$mensaje',
    showConfirmButton: false,
    timer: 1500
  })
  
if('$tipo_alerta' == 'success'){
  setTimeout(function(){

    window.location='ver_productos.php';
   }, 1500);
}else{

}

</script>

";




//header("location:http://localhost/adminmaygel/ver_productos.php");



?>