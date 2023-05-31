<?php

session_start();
include 'configuracion/database.php';

if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT *FROM administrador WHERE id = :id  ');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
        $user = $results;
    }
}

$consultar_productos = $conn->prepare("SELECT * FROM productos");
$consultar_productos->execute();
$consultar_productos = $consultar_productos->fetchAll(PDO::FETCH_ASSOC);

$arrayCodigos=array();
?>

<?php if (!empty($user)){?>

<?php include "headers/header.php"?>



<div class="page-container">


    <div class="page-content">
        <div class="page-inner">
            <!-- Main Wrapper -->
            <div id="main-wrapper">
                <div class="pageheader pd-t-25 pd-b-35">
                    <div class="pd-t-5 pd-b-5">
                        <h1 class="pd-0 mg-0 tx-20">PRODUCTOS</h1>
                    </div>
                    <div class="breadcrumb pd-0 mg-0">
                        <a class="breadcrumb-item" href="index.html"><i class="icon ion-ios-home-outline"></i>
                            Home</a>
                        <a class="breadcrumb-item" href="#">Inicio</a>
                        <span class="breadcrumb-item active">Productos</span>
                    </div>
                </div>
                <!--/ Breadcrumb End -->
                <!--================================-->
                <!-- TODOS LOS PRODUCTOS -->
                <!--================================-->

                <div class="row row-xs clearfix">
                    <div class="col-md-12 col-lg-12">
                        <div class="card mg-b-20">
                            <div class="card-header">
                                <h4 class="card-header-title">
                                    Tabla productos
                                </h4>

                                <div class="card-header-btn">
                                    <a href="#" data-toggle="collapse" class="btn card-collapse"
                                        data-target="#collapse1" aria-expanded="true"><i
                                            class="ion-ios-arrow-down"></i></a>
                                    <a href="#" data-toggle="refresh" class="btn card-refresh"><i
                                            class="ion-android-refresh"></i></a>
                                    <a href="#" data-toggle="expand" class="btn card-expand"><i
                                            class="ion-android-expand"></i></a>
                                    <a href="#" data-toggle="remove" class="btn card-remove"><i
                                            class="ion-android-close"></i></a>
                                </div>
                            </div>
                            <div class="card-body collapse show" id="collapse1">

                                <div id="eliminar_producto"></div>
                                <h5>Añadir producto: <a type="button" data-toggle="modal"
                                        data-target="#añadir_productos" class="btn btn-label-success btn-sm mg-y-5">

                                        <i class="fa fa-link"></i> Añadir</a></h5>

                                <!-- Button trigger modal -->




                                <table id="basicDataTable" class="table responsive nowrap">
                                    <thead>

                                        <tr>
                                            <th>Nombre</th>
                                            <th class="text-center">Categoría</th>

                                            <th class="text-center">Precio</th>
                                            <th class="text-center">Cantidad stock</th>
                                            <th class="text-center">Descripción</th>
                                            <th class="tx-center">Código barra</th>
                                            <th class="tx-center">Foto producto</th>
                                            <th class="tx-center">Estado</th>
                                            <th class="text-center">Acción</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        <?php 
                                                foreach($consultar_productos as $producto){

                                                    $arrayCodigos[]=(string)$producto["codigo_barra"];
                                                 
                                               ?>
                                        <tr>
                                            <td> <a href="javascript:void(0)"> <?php echo $producto["nombre"]?></a></td>
                                            <td><?php echo $producto["categoria"]?></td>

                                            <td><?php echo $producto["precio"]?></td>
                                            <td><?php echo $producto["stock"]?></td>
                                            <td><?php echo $producto["descripcion"]?>
                                            </td>
                                            <td>
                                                <?php/* echo $producto["codigo_barra"]*/?>
                                                <input type="hidden" id="codigo"
                                                    value="<?php echo $producto['codigo_barra'];?>">
                                                <canvas id='<?php echo "canvas".$producto['codigo_barra']; ?>'
                                                    style="width:100px; height:120px;"></canvas>
                                                <a title="Descargar codigo" href="javascript:void(0)"
                                                    class="btn btn-success btn-icon mg-b-4"
                                                    id="<?php echo "download".$producto['codigo_barra']; ?>"
                                                    onclick="descargar('<?php echo 'canvas'.$producto['codigo_barra']; ?>','<?php echo $producto['codigo_barra']; ?>' )">
                                                    <i style="width: 20px;" class="fa fa-download"></i> </a>
                                            </td>
                                            <td>
                                                <img src="fotos/productos/<?php echo $producto["id"] ?>/<?php echo $producto["foto_producto"]?>"
                                                    alt="" style="width:60px">
                                            </td>

                                            <td><?php if( $producto["estado"] == 0 ){
                                                    echo '<span class="badge badge-outlined badge-danger">Desactivado</span>';
                                                }else{
                                                    echo '<span class="badge badge-outlined badge-success">Activado</span>'; 
                                                }?>
                                            <td>
                                                <a href="javascript:void(0)"
                                                    onclick="editarProductos('<?php echo $producto['id']; ?>')"
                                                    title="Editar" data-toggle="modal" data-target="#editar_producto"
                                                    class="btn btn-label-primary btn-sm mg-y-5"><i
                                                        class="fa fa-pencil"></i> Editar</a>


                                                <a href="javascript:void(0)"
                                                    onclick="eliminarProducto('<?php echo $producto['id']; ?>')"
                                                    class="btn btn-label-danger btn-sm mg-y-5"><i
                                                        class="fa fa-trash"></i> Eliminar</a>
                                            </td>
                                        </tr>

                                        <?php }?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Categoría</th>
                                            <th class="text-center">Nombre</th>
                                            <th class="text-center">Precio</th>
                                            <th class="text-center">Cantidad stock</th>
                                            <th class="text-center">Descripción</th>
                                            <th class="tx-center">Código barra</th>
                                            <th class="tx-center">Foto producto</th>
                                            <th class="tx-center">Estado</th>
                                            <th class="text-center">Acción</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<div id="eliminar_producto"></div>

<script src="js/JsBarcode.all.min.js"></script>


<script>
function arrayjsonbarcode(j) {
    json = JSON.parse(j);
    arr = [];
    for (var x in json) {
        arr.push(json[x]);
    }
    return arr;
}

jsonvalor = '<?php echo json_encode($arrayCodigos) ?>';
valores = arrayjsonbarcode(jsonvalor);

for (var i = 0; i < valores.length; i++) {

    JsBarcode("#canvas" + valores[i], valores[i].toString(), {
        format: "upc",
        lineColor: "#000",
        width: 2,
        height: 30,
        displayValue: true
    });


    alerta(valores[i].toString());

    function alerta(cod) {
        // alert(cod);
    }
}


/*
console.log(jsonvalor);
alerta();

function alerta(){

var codigo = document.getElementById("codigo").value;


JsBarcode("canvas", codigo, {
        fontSize: 12,
 background: "#4b8b7f",
        lineColor: "black",
        margin: 20,
        marginLeft: 40
    });

}
*/
function descargar(codigo, download) {

    var canvas = document.getElementById(codigo);

    console.log(canvas);
    var filename = prompt("Guardar como...", download);
    if (canvas.msToBlob) { //para internet explorer
        var blob = canvas.msToBlob();
        window.navigator.msSaveBlob(blob, filename + ".png"); // la extensión de preferencia pon jpg o png
    } else {
        link = document.getElementById("download" + download);
        //Otros navegadores: Google chrome, Firefox etc...
        link.href = canvas.toDataURL("image/png"); // Extensión .png ("image/png") --- Extension .jpg ("image/jpeg")
        link.download = filename;
    }
}



function editarProductos(idProveedor) {
    var ir_url = "action/editar_productos.php?id=" + idProveedor;
    $.ajax({
        cache: false,
        async: false,
        url: ir_url,
        beforeSend: function() {
            $("#editarModal").html("Cargando datos espere...");
        },
        success: function(data) {
            $("#editarModal").html(data);
        },
        error: function(data) {
            $("#editarModal").html("ocurrio un error");
        }

    });

}

function eliminarProducto(id_producto) {
    var ir_url = "action/eliminar_producto.php?id=" + id_producto;
    $.ajax({
        cache: false,
        async: false,
        url: ir_url,
        beforeSend: function() {
            $("#eliminar_producto").html("Cargando datos espere...");
        },
        success: function(data) {
            $("#eliminar_producto").html(data);
        },
        error: function(data) {
            $("#eliminar_producto").html("ocurrio un error");
        }
    });

}
</script>





<?php include "footers/footer.php" ?>

<?php }else{
echo"<script language='javascript'>window.location='index.php'</script>;";

} ?>