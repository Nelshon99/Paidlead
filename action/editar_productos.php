<?php

require '../configuracion/database.php';

$id_producto = $_GET["id"];

$consultar_productos = $conn->prepare("SELECT * FROM productos where id= '$id_producto'");
$consultar_productos->execute();
$consultar_productos = $consultar_productos->fetchAll(PDO::FETCH_ASSOC);


$consultar_categorias_p = $conn->prepare("SELECT * FROM categorias_p");
$consultar_categorias_p->execute();
$consultar_categorias_p = $consultar_categorias_p->fetchAll(PDO::FETCH_ASSOC);


foreach ($consultar_productos as $producto) {
}
?>



<div class="modal-body">
    <div id="mensjae_producto_actualizado"></div>
    <form id="actualizar_productos" enctype="multipart/form-data">
        <div class="producto">
            <div class="col-12 col-sm-12">
                <div class="row">
                    <input type="hidden" class="form-control" id="recipient-name" name="id_producto"
                        value="<?php echo $producto["id"]; ?>">

                    <div class="col-6 col-sm-6">
                        <label for="recipient-name" class="col-form-label">Categoria</label>
                        <select name="categoria" id="categoria" class="form-control">
                            <option value="<?php echo $producto["categoria"]?>" selected>
                                <?php echo $producto["categoria"]?>
                            </option>
                            <?php 
                               foreach ($consultar_categorias_p as $categorias){
                              ?>

                            <option value="<?php echo $categorias["nombre"] ?>"><?php echo $categorias["nombre"]?>
                            </option>
                            <?php 
                               }
                              ?>
                        </select>
                    </div>

                    <div class="col-6 col-sm-6">
                        <label for="message-text" class="col-form-label">Nombre:</label>
                        <input type="text" class="form-control" id="recipient-name" name="nombre"
                            value="<?php echo $producto["nombre"]?>">
                    </div>


                    <div class="col-6 col-sm-6">
                        <label>Precio unidad</label>
                        <input type="text" class="form-control" id="recipient-name" name="precio"
                            value="<?php echo $producto["precio"]?>">
                    </div>

                    <div class="col-6 col-sm-6">
                        <label>Cantidad stock</label>
                        <input type="text" class="form-control" id="recipient-name" name="cantidad_stcok"
                            value="<?php echo $producto["stock"]?>">
                    </div>


                    <div class="col-6 col-sm-6">
                        <label>Descripción</label>
                        <input type="text" class="form-control" id="recipient-name" name="descripcion"
                            value="<?php echo $producto["descripcion"]?>">
                    </div>

                    <div class="col-6 col-sm-6">
                        <label>Código del producto</label>
                        <input type="text" class="form-control" placeholder="Por escriba un código" name="codigo_barra"
                            value="<?php echo $producto["codigo_barra"]?>">

                    </div>

                    <div class="col-6 col-sm-6">
                        <label>Foto del producto</label>
                        <input type="file" class="form-control" name="foto_producto">
                        <label for="">Foto agregada: <?php echo $producto["foto_producto"]?></label>
                    </div>
                    <div class="col-6 col-sm-6">
                        <label>Estado del producto</label>
                        <select class="form-control" name="estado" id="estado">
                            <option value="<?php echo $producto["estado"]?>" selected><?php 
                            
                            if( $producto["estado"] == 0 ){
                                echo "Desactivado";
                            }else{
                                echo "Activado"; 
                            }
                            
                            
                            ?>
                            </option>
                            <option value="1">Activado</option>
                            <option value="0">Desactivado</option>

                        </select>
                    </div>

                </div>
            </div>
        </div>
        <div class="modal-footer">

            <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Cancelar</button>
            <a href="javascript:void(0)" onclick="actualizar_producto()" class="btn btn-primary">Actualizar</a>
        </div>

    </form>
</div>


<script>
function actualizar_producto() {
    // alert("entro");

    var mensaje;
    var opcion = confirm("¿Estás seguro de realizar esta acción?");

    if (opcion == true) {
        var url_peticion = "action/actualizar_productos.php";

        $.ajax({
            type: "POST",
            url: url_peticion,
            data: new FormData($("#actualizar_productos")[0]),
            contentType: false,
            processData: false,

            beforeSend: function() {
                $("#mensjae_producto_actualizado").html("Cargando, por favor espere...");
            },
            success: function(data) {
                $("#mensjae_producto_actualizado").html(data);
            },
            error: function() {
                alert("Por favor vuelvelo a intentar más tarde");
            },
        });

    } else {
        fadeOut();
    }
}
</script>