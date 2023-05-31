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

$id_usuario = $_SESSION['user_id'];

$consultar_clientes = $conn->prepare("SELECT * FROM administrador WHERE id='$id_usuario'");
$consultar_clientes->execute();
$consultar_clientes = $consultar_clientes->fetchAll(PDO::FETCH_ASSOC);

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
                            <h1 class="pd-0 mg-0 tx-20">MI PERFIL</h1>
                        </div>
                        <div class="breadcrumb pd-0 mg-0">
                            <a class="breadcrumb-item" href="index.html"><i class="icon ion-ios-home-outline"></i>
                                Home</a>
                            <a class="breadcrumb-item" href="#">Dashboard</a>
                            <span class="breadcrumb-item active">Mi perfil</span>
                        </div>
                    </div>
                    <!--/ Breadcrumb End -->
                    <!--================================-->
                    <!-- informacion de ordenes en tiempo real -->
                    <!--================================-->

                </div>

                <!--/ Border Form Group End -->
                <!--================================-->
                <!-- Placeholder As Label Start -->
                <!--================================-->
                <div class="col-md-12 col-lg-12">
                    <div class="card mg-b-20">
                        <div class="card-header">
                            <h4 class="card-header-title">
                              Mis datos
                            </h4>
                            <div class="card-header-btn">
                                <a href="#" data-toggle="collapse" class="btn card-collapse" data-target="#collapse3"
                                    aria-expanded="true"><i class="ion-ios-arrow-down"></i></a>
                                <a href="#" data-toggle="refresh" class="btn card-refresh"><i
                                        class="ion-android-refresh"></i></a>
                                <a href="#" data-toggle="expand" class="btn card-expand"><i
                                        class="ion-android-expand"></i></a>
                                <a href="#" data-toggle="remove" class="btn card-remove"><i
                                        class="ion-android-close"></i></a>
                            </div>
                        </div>
                        <div class="card-body collapse show" id="collapse3">
                            <div class="form-layout form-layout-3">
                               <?php
                               foreach($consultar_clientes as $usuarios){
                                ?>
                                <form action="action/actualizar_admin.php" method="POST">
                                <div class="row no-gutters">
                                    
                                    <input type="hidden" class="form-control" id="recipient-name" name="id"
                                        value="<?php echo $usuarios["id"]; ?>">

                                    <div class="col-6 col-sm-6">
                                        <label for="recipient-name" class="col-form-label">Nombre asesor:</label>
                                        <input type="text" class="form-control" id="recipient-name" name="nombre_asesor"
                                            value="<?php echo $usuarios["nombre_asesor"]; ?>">
                                    </div>

                                    <div class="col-6 col-sm-6">
                                        <label for="message-text" class="col-form-label">Telefono:</label>
                                        <input type="text" class="form-control" id="recipient-name" name="telefono"
                                            value="<?php echo $usuarios["telefono"]; ?>">
                                    </div>

                                    <div class="col-6 col-sm-6">
                                        <label for="message-text" class="col-form-label">Email</label>
                                        <input type="text" class="form-control" id="recipient-name" name="email"
                                            value="<?php echo $usuarios["email"]; ?>">
                                    </div>


                                    <div class="col-6 col-sm-6">
                                        <label for="message-text" class="col-form-label">Contraseña</label>
                                        <input type="text" class="form-control" id="recipient-name" name="password">
                                    </div>

                                

                                </div>
                                <!-- row -->
                                <div class="form-layout-footer bd pd-20 bd-t-0">
                                    <button class="btn btn-custom-primary">Actualizar</button>
                                 
                                </div>
                                <!-- form-group -->
                            </div>

                              </form>
                            <?php }?>
                        </div>
                    </div>
                </div>
                <!--/ Placeholder As Label End -->



            </div>
            <!--/ Main Wrapper End -->
        </div>
    </div>
    <!--/ Page Inner End -->
    <!--================================-->


</body>





<?php include "footers/footer.php" ?>

<?php }else{
echo"<script language='javascript'>window.location='index.php'</script>;";

} ?>