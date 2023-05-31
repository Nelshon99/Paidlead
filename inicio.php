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
$consultar_compras = $conn->prepare("SELECT * FROM compras ORDER BY id DESC limit 10");
$consultar_compras->execute();
$consultar_compras = $consultar_compras->fetchAll(PDO::FETCH_ASSOC);


?>

<?php if (!empty($user)){?>

<?php include "headers/header.php"?>

<body>


    <!--================================-->
    <!-- Page Container Start -->
    <!--================================-->
    <div class="page-container">

        <div class="page-content">
            <div class="page-inner">
                <!-- Main Wrapper -->
                <div id="main-wrapper">
                    <div class="pageheader pd-t-25 pd-b-35">
                        <div class="pd-t-5 pd-b-5">
                            <h1 class="pd-0 mg-0 tx-20">Bienvenido <?php echo  $Nombre_encargado; ?></h1>
                        </div>
                        <div class="breadcrumb pd-0 mg-0">
                            <a class="breadcrumb-item" href="./"><i class="icon ion-ios-home-outline"></i>
                                Home</a>
                            <a class="breadcrumb-item" href="#">Dashboard</a>
                            <span class="breadcrumb-item active"></span>
                        </div>
                    </div>
                    <!--/ Breadcrumb End -->
                    <!--================================-->
                    <!-- informacion de ordenes en tiempo real -->
                    <!--================================-->
                    <div class="col-md-12 col-xl-12">
                        <div class="card mg-b-20">
                            <div class="card-header">
                                <h4 class="card-header-title">
                                    Ultimas 10 compras
                                </h4>
                                <div class="card-header-btn">
                                    <a href="#" data-toggle="collapse" class="btn card-collapse"
                                        data-target="#customarDetails" aria-expanded="true"><i
                                            class="ion-ios-arrow-down"></i></a>
                                    <a href="#" data-toggle="refresh" class="btn card-refresh"><i
                                            class="ion-android-refresh"></i></a>
                                    <a href="#" data-toggle="expand" class="btn card-expand"><i
                                            class="ion-android-expand"></i></a>
                                    <a href="#" data-toggle="remove" class="btn card-remove"><i
                                            class="ion-ios-trash-outline"></i></a>
                                </div>
                            </div>
                            <div class="card-body pd-0 collapse show" id="customarDetails">

                                <div class="card-body collapse show" id="collapse1">
                                    <div class="table-responsive">
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
                                               
                                                ?> <tr>
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
                                                        <a href="compras.php" class="btn btn-sm btn-label-danger">Ir a
                                                            compras</a>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--================================-->
                    <!-- informacion previa de los pedidos del dia -->
                    <!--================================-->


                </div>
                <!--/ Main Wrapper End -->
            </div>
        </div>
        <!--/ Page Inner End -->
        <!--================================-->
    </div>

</body>





<?php include "footers/footer.php" ?>

<?php }else{
echo"<script language='javascript'>window.location='index.php'</script>;";
} ?>