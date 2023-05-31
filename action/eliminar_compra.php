<?php 

include '../configuracion/database.php';


$id_compra = $_GET["id_compra"];

$eliminando_compra = $conn->prepare("DELETE FROM compras WHERE id='$id_compra'");
$eliminando_compra->execute();

if($eliminando_compra == null){
$error  = "error";
$mensaje = "Error al eliminar esta compra, vuelve a intentarlo más tarde.";
}else{

   $suma_stock=0;
   $consultar_producto_compra = $conn->prepare("SELECT * FROM producto_compras WHERE id_compra='$id_compra'");
   $consultar_producto_compra->execute();
   $consultar_producto_compra = $consultar_producto_compra->fetchAll(PDO::FETCH_ASSOC);

   foreach($consultar_producto_compra as $compra){
      
      
      $id_producto = $compra["id_producto"];
      $cantidad_producto_compra = $compra["cantidad_producto"];
      $consultar_stock_producto = $conn->prepare("SELECT * FROM productos WHERE id='$id_producto'");
      $consultar_stock_producto->execute();
      $consultar_stock_producto = $consultar_stock_producto->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($consultar_stock_producto as $producto){
         $cantidad_stock_producto = $producto["stock"];
         $suma_stock = $cantidad_stock_producto +  $cantidad_producto_compra ;

         $actualizar_stock = $conn->prepare("UPDATE productos SET stock = '$suma_stock' WHERE id = '$id_producto' ");
         $actualizar_stock->execute();
        }
   }
   
$eliminando_producto_compra = $conn->prepare("DELETE FROM producto_compras WHERE id_compra='$id_compra'");
$eliminando_producto_compra->execute();  

$error="success";
$mensaje="Compra eliminada correctamente.";


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
 
     window.location='compras.php';
    }, 1500);
 }else{
 
 }

</script>";



?>