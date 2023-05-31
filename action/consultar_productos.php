<?php 
session_start();
include "../configuracion/database.php";


 $codigo_barra = $_GET["codigo_barra"];

$consultar_producto = $conn->prepare("SELECT * FROM productos WHERE codigo_barra = '$codigo_barra' ");
$consultar_producto->execute();
$consultar_producto = $consultar_producto->fetchAll(PDO::FETCH_ASSOC);

if($consultar_producto == null){

    echo "Producto no registrado en nuestra base de datos o por favor vuelva a escanear el producto.";

}else{
    


foreach($consultar_producto as $producto){
    $id_producto = $producto["id"];
    $nombre_producto = $producto["nombre"];
    $precio_producto = $producto["precio"];
    $descripcion = $producto["descripcion"];
    $stock = $producto["stock"];
    $foto_producto = $producto["foto_producto"];
    
    
}

?>

<style>
.flex-container {
    display: flex;

    flex-direction: row;

}

.flex-container>div {

    margin: 10px;
    text-align: center;




}
</style>


<form id="form_añadir_carrito">



    <div class="card card-accent-primary  mg-15">
        <div class="card-header"><?php echo $nombre_producto; ?></div>
        <div class="card-body">
            <div class="row">
                <div class="col-4">
                    <img src="fotos/productos/<?php echo $id_producto; ?>/<?php echo $foto_producto; ?>" alt=""
                        style="width:60px">
                </div>
                <div class="col-8">
                    <h6><b>Precio: </b>$<?php echo number_format($precio_producto) ?> Cop</h6>
                    <h6><b>Descripción: </b><?php echo $descripcion ?> </h6>


                </div>
            </div>
            <label for="" class="mg-15">Seleccione una cantidad:</label>

            <div class="flex-container">
                <div> <a class="btn btn-outline-primary btn-icon mg-r-5" href="javascript:void(0)"
                        onclick="disminucion()">-</a></div>
                <div>
                    <input type="number" disabled class="form-control" id="cantidad_producto" name="cantidad_producto"
                        value="1" max="<?php echo $stock;?>" min="1">
                    <input type="hidden" name="id_producto" value="<?php echo $id_producto;?>">

                </div>
                <div> <a class="btn btn-outline-primary btn-icon mg-r-5" href="javascript:void(0)"
                        onclick="incrementar(<?php echo  $stock?>)">+</a></div>

            </div>


            <a href="javascript:void(0)" class="btn btn-warning btn-block mg-b-10"
                onclick="agregar_carrito('<?php echo $producto['id']?>',<?php echo '2';?>,<?php echo $producto['stock'];?> )"><i
                    class="fa fa-shopping-cart mg-r-10"> </i>Agregar al carrito</a>


        </div>
    </div>
</form>

<?php 

}
?>