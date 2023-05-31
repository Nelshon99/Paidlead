<?php

include "../configuracion/database.php";

$consultar_productos = $conn->prepare("SELECT * FROM productos  ORDER BY id DESC LIMIT 10");
$consultar_productos->execute();
$consultar_productos = $consultar_productos->fetchAll(PDO::FETCH_ASSOC);

?>


<table class="table table-hover mb-0">
    <thead class="tx-dark tx-uppercase tx-10 tx-bold">
        <tr>
            <th>Producto</th>
            <th class="tx-right">Precio WH COP</th>
            <th class="tx-right">Precio RT COP</th>
            <th class="tx-right">Precio WH USD</th>
            <th class="tx-right">Precio RT USD</th>
            <th class="tx-right">cantidad stock</th>
            <th class="tx-right">Stock Status</th>
        </tr>
    </thead>
    <tbody>

        <?php  
                foreach($consultar_productos as $productos){
                   
                    $id_producto = $productos["id"];

                    $consultar_variante_p = $conn->prepare("SELECT * FROM variante_p WHERE id_p = '$id_producto'");
                    $consultar_variante_p->execute();
                    $consultar_variante_p = $consultar_variante_p->fetchAll(PDO::FETCH_ASSOC);
                    $suma=0;
                    foreach($consultar_variante_p as $variante_p){

                        $suma += $variante_p["cantidad_stock"];


                    }


                    ?>

        <tr>
            <td><a href="#"><?php echo $productos["nombre"];?></a></td>
            <td class="tx-right tx-info">$<?php echo number_format($productos["precio"]);?></td>
            <td class="tx-right tx-info">$<?php echo number_format($productos["who_cop"]);?></td>
            <td class="tx-right tx-success">$<?php echo number_format($productos["pre_dolar"]);?></td>
            <td class="tx-right tx-success">$<?php echo number_format($productos["who_usd"]);?></td>

            <td class="tx-right tx-medium tx-dark"><?php echo $suma ?></td>

            <?php 
                    if($suma == 0){
                    ?>

            <td class="tx-right"><i class="fa fa-exclamation-triangle text-danger"></i> Fuera de Stock</td>
            <?php 
                    }else{
                    ?>
            <td class="tx-right"><i class="fa fa-check mr-1 text-success"></i> En Stock</td>
            <?php 
                    }
                    ?>
        </tr>
        <?php }?>
    </tbody>
</table>