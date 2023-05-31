<?php 

include "../configuracion/database.php";
$id_compra = $_GET["id_compra"];
$consultar_producto_compra = $conn->prepare("SELECT * FROM producto_compras WHERE id_compra='$id_compra'");
$consultar_producto_compra->execute();
$consultar_producto_compra = $consultar_producto_compra->fetchAll(PDO::FETCH_ASSOC);

?>




<div class="modal-body">
    <?php foreach ($consultar_producto_compra as $producto) {

    $id_producto = $producto["id_producto"];
    $query_producto = $conn->prepare("SELECT * FROM productos where id = '$id_producto'");
    $query_producto->execute();
    $productos = $query_producto->fetch(PDO::FETCH_OBJ);

    ?>

    <div id="accordionBodybg">
        <div class="card mb-2">
            <div class="card-header">
                <a class="text-dark" data-toggle="collapse" href="#accordionBodybg1" aria-expanded="true">
                    <?php echo "$productos->nombre"; ?>
                </a>
            </div>
            <div id="accordionBodybg1" class="collapse show bg-body" data-parent="#accordionBodybg" style="">
                <div class="card-body ">
                    <ul class="list-group list-group-flush">
                        <li style="display:flex;" class="list-group-item">
                            <div><b>Tipo de producto:</b>&nbsp;</div>
                            <div><?php echo "$productos->categoria" ?></div>
                        </li>
                        <li style="display:flex;" class="list-group-item">
                            <div><b>Precio unitario:</b>&nbsp;</div>
                            <div><?php echo "$productos->precio" ?></div>
                        </li>
                        <li style="display:flex;" class="list-group-item">
                            <div><b>Cantidad:</b>&nbsp;</div>
                            <div><?php echo $producto["cantidad_producto"]; ?></div>
                        </li>
                        <li style="display:flex;" class="list-group-item">
                            <div><b>Sub total:</b>&nbsp;</div>
                            <div>$<?php $sub_total = $productos->precio * $producto["cantidad_producto"];
                            echo number_format( $sub_total) 
                            
                            ?> COP</div>
                        </li>

                    </ul>
                </div>
            </div>
        </div>

    </div>
    <?php

}
?>

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

</div>