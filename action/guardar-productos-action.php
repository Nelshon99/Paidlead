<?php 

include "../configuracion/database.php";


 $nombre = $_POST['nombre'];
 $categoria_producto = $_POST["categoria"];
 $precio = $_POST['precio'];
 $cantidad_stcok = $_POST['cantidad_stcok'];
 
 $descripcion = $_POST['descripcion'];
 $codigo_barra = $_POST['codigo_barra'];
 $estado = $_POST['estado'];

 $foto_producto = $_FILES['foto_producto']['name'];


 if($categoria_producto == null){
    $mensaje = "Por favor ingresa la categoría del producto.";
    $tipo_alerta = "error";
}else if($nombre == null){

    $mensaje = "Por favor ingresa el nombre del producto.";
    $tipo_alerta = "error";

}else if($precio == null){
    $mensaje = "Por favor ingresa el precio del producto.";
    $tipo_alerta = "error";
}else if($cantidad_stcok == null){
    $mensaje = "Por favor ingresa la cantidad stock del producto.";
    $tipo_alerta = "error";

}else if($descripcion == null){
    $mensaje = "Por favor ingresa la descripción del producto.";
    $tipo_alerta = "error";

}else if($codigo_barra == null){
    $mensaje = "Por favor genera el codigo de barra del producto.";
    $tipo_alerta = "error";

}else if($foto_producto == null){
    $mensaje = "Por favor ingresa la foto del producto.";
    $tipo_alerta = "error";

}else if($estado == null){
    $mensaje = "Por favor ingresa el estado del producto.";
    $tipo_alerta = "error";

}else{


     $guardar_productos = $conn->prepare("INSERT INTO productos (categoria,nombre,precio,stock,descripcion,creado,codigo_barra,foto_producto,estado) 
     VALUES('$categoria_producto','$nombre','$precio','$cantidad_stcok','$descripcion','NOW()','$codigo_barra','$foto_producto',$estado)");

     $guardar_productos->execute();


     $consultar_producto = $conn->prepare("SELECT * FROM productos WHERE codigo_barra = '$codigo_barra'");
     $consultar_producto->execute();
     $consultar_producto = $consultar_producto->fetchAll(PDO::FETCH_ASSOC);

     foreach($consultar_producto as $producto){
         $id_producto = $producto["id"];
     }

     $directorio = "../fotos/productos/$id_producto";

    if (!file_exists($directorio)) {
        mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");
    }

    $dir = opendir($directorio);
    $files = $_FILES;

    foreach ($files as $clave => $valor) {
        $filename = $valor["name"];
        $source = $valor["tmp_name"];

        $target_path = $directorio . '/' . $filename;

        $nom = $filename;
        move_uploaded_file($source, $target_path);
    }

     if($guardar_productos == null){
        $mensaje = "No se puedo guardar el producto, intentalo nuevamente.";
        $tipo_alerta = "error";
     }else{
        $mensaje = "Producto guardado correctamente.";
        $tipo_alerta = "success";
     }

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



?>