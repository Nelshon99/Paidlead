<?php

session_start();
include 'configuracion/database.php';

if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT *FROM administrador WHERE id = :id  ');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;
    $admin = $_SESSION['user_id'];
    if (count($results) > 0) {
        $user = $results;
    }
}
$consultar_compras = $conn->prepare("SELECT * FROM compras ORDER BY id DESC");
$consultar_compras->execute();
$consultar_compras = $consultar_compras->fetchAll(PDO::FETCH_ASSOC);
?>

<?php if (!empty($user)){?>

<?php include "headers/header.php"?>

<body>

    <div class="page-container">

        <div class="page-content">
            <div class="page-inner">
                <!-- Main Wrapper -->
                <div id="main-wrapper">
                    <div class="pageheader pd-t-25 pd-b-35">
                        <div class="pd-t-5 pd-b-5">
                            <h1 class="pd-0 mg-0 tx-20">COMPRAS REALIZADAS POR CLIENTES</h1>
                        </div>
                        <div class="breadcrumb pd-0 mg-0">
                            <a class="breadcrumb-item" href="index.html"><i class="icon ion-ios-home-outline"></i>
                                Home</a>
                            <a class="breadcrumb-item" href="#">Inicio</a>
                            <span class="breadcrumb-item active">Compras</span>
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
                                        Tabla Compras
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

                                    <div id="eliminando_pedido"></div>


                                    <table id="basicDataTable3" class="table responsive nowrap">
                                        <thead>

                                            <tr>

                                                <th>#ID Compra</th>
                                                <th class="text-center">Nombre cliente</th>
                                                <th class="text-center">Teléfono</th>
                                                <th class="text-center"> Email</th>
                                                <th class="text-center">Valor compra</th>
                                                <th class="text-center">referencia pago</th>
                                                <th class="text-center">Estado</th>
                                                <th class="text-center">Accion</th>

                                            </tr>

                                        </thead>
                                        <tbody>

                                            <?php

                                                foreach ($consultar_compras as $compra) {
                                               
                                                ?>
                                            <tr>
                                                <td><a href="javascript:void(0)"><?php echo $compra["id"]?></a></td>
                                                <td><?php echo $compra["nombre_persona"]?></td>
                                                <td><?php echo $compra["telefono"]?></td>
                                                <td><?php echo $compra["email"]?></td>
                                                <td>$<?php echo number_format($compra["valor_compra"])?> COP</td>
                                                <td><?php echo $compra["referencia_pago"]?></td>
                                                <td><span
                                                        class="badge badge-outlined badge-success"><?php echo $compra["estado_compra"]?></span>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0)"
                                                        onclick="verDeatllecompra('<?php echo $compra['id']; ?>')"
                                                        title="Editar" data-toggle="modal"
                                                        data-target="#ver_detalle_compra"
                                                        class="btn btn-label-primary btn-sm mg-y-5"><i
                                                            class="fa fa-pencil"></i> Ver más detalles</a>


                                                    <a href="javascript:voi(0)"
                                                        onclick="eliminarCompra('<?php echo $compra['id'] ?>')"
                                                        class="btn btn-label-danger btn-sm mg-y-5"><i
                                                            class="fa fa-trash"></i> Eliminar compra</a>
                                                </td>



                                            </tr>

                                            <?php }?>


                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>#ID Compra</th>
                                                <th class="text-center">Nombre cliente</th>
                                                <th class="text-center">Teléfono</th>
                                                <th class="text-center"> Email</th>
                                                <th class="text-center">Valor compra</th>
                                                <th class="text-center">referencia pago</th>
                                                <th class="text-center">Estado</th>
                                                <th class="text-center">Accion</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <div id="eliminando_compra"></div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal ver detalle compra -->
    <div class="modal fade" id="ver_detalle_compra" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Prodcutos agregados a la compra
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div id="ver_detalle_compras"></div>
            </div>
        </div>
    </div>

</body>

<script>
function verDeatllecompra(id_compra) {

    var ir_url = "action/ver_detalle_compra.php?id_compra=" + id_compra;

    $.ajax({
        cache: false,
        async: false,
        url: ir_url,
        beforeSend: function() {
            $("#ver_detalle_compras").html("Cargando datos espere...");
        },
        success: function(data) {
            $("#ver_detalle_compras").html(data);
        },
        error: function(data) {
            $("#ver_detalle_compras").html("ocurrio un error");
        },
        timeout: 8000
    });


}

function eliminarCompra(id_compra) {

    var retVal = confirm("¿Seguro desea continuar?");
    if (retVal == true) {
        var ir_url = "action/eliminar_compra.php?id_compra=" + id_compra;
        $.ajax({
            cache: false,
            async: false,
            url: ir_url,
            beforeSend: function(data) {
                $("#eliminando_compra").html("Cargando datos espere...");
            },
            success: function(data) {
                $("#eliminando_compra").html(data);
            },
            error: function(data) {
                $("eliminando_compra").html("ocurrio un error");
            }
        });
    }
}
</script>

<?php include "footers/footer.php";?>

<?php }else{
echo"<script language='javascript'>window.location='index.php'</script>;";

} ?>