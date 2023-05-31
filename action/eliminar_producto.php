<?php 

include "../configuracion/database.php";


$id_producto = $_GET["id"];

$eliminar_productos = $conn->prepare("UPDATE productos SET estado = '0'");
$eliminar_productos->execute();


if($eliminar_productos == null){

$error="error";
$mensaje="Hubo en error al eliminar el producto, intentalo más tarde";

}else{
   $error="success";
   $mensaje="Producto eliminado correctamente.";
}

echo "

<script>

Swal.fire({
    position: 'top-end',
    icon: '$error',
    title: '$mensaje',
    showConfirmButton: false,
    timer: 1500
  })
  if('$error' == 'success'){
   setTimeout(function(){
 
     window.location='ver_productos.php';
    }, 1500);
 }else{
 
 }

</script>";



?>