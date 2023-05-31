<?php

include 'configuracion/database.php';

if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT *FROM administrador WHERE id = :id  ');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;
   $id_admin =  $_SESSION['user_id'];
    if (count($results) > 0) {
        $user = $results;
    }
}
$id_admin = $_SESSION['user_id'];
$consultar_datos_admin = $conn->prepare("SELECT * FROM administrador WHERE id= '$id_admin ' ");
$consultar_datos_admin->execute();
$consultar_datos_admin = $consultar_datos_admin->fetchAll(PDO::FETCH_ASSOC);

foreach($consultar_datos_admin as $users){
    $Nombre_encargado = $users["nombre_asesor"];
    $email = $users["email"];
    $verificar_admin = $users["admin"];
}

?>


<!DOCTYPE html>
<html lang="zxx">
<!-- Mirrored from colorlib.net/metrical/light/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 Jan 2020 21:18:43 GMT -->

<head>
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keyword" content="">
    <meta name="author" content="" />
    <!-- Page Title -->
    <title>PAIDLEAD</title>
    <!-- Main CSS -->
    <link type="text/css" rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome.min.css" />
    <link type="text/css" rel="stylesheet" href="assets/plugins/flag-icon/flag-icon.min.css" />
    <link type="text/css" rel="stylesheet" href="assets/plugins/simple-line-icons/css/simple-line-icons.css">
    <link type="text/css" rel="stylesheet" href="assets/plugins/ionicons/css/ionicons.css">
    <!--<link type="text/css" rel="stylesheet" href="assets/plugins/toastr/toastr.min.css">-->
    <link type="text/css" rel="stylesheet" href="assets/plugins/chartist/chartist.css">
    <link type="text/css" rel="stylesheet" href="assets/plugins/apex-chart/apexcharts.css">
    <link type="text/css" rel="stylesheet" href="assets/css/app.min.css" />
    <link type="text/css" rel="stylesheet" href="assets/css/style.min.css" />
    <!-- Favicon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn"t work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="http://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->

    <script src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<div class="page-sidebar">
    <div class="logo">
        <a class="logo-img" href="./">
            <img class="desktop-logo" src="assets/images/logo_pequeño_1.png" alt="" style="width:100%;">
            <img class="small-logo" src="assets/images/logo_pequeño_1.png" alt="">
        </a>
        <i class="ion-ios-close-empty" id="sidebar-toggle-button-close"></i>
    </div>
    <!--================================-->
    <!-- Sidebar Menu Start -->
    <!--================================-->
    <div class="page-sidebar-inner">
        <div class="page-sidebar-menu">
            <ul class="accordion-menu">
                <li class="open active">
                    <a href="#"><i data-feather="home"></i>
                        <span>Dashboard</span><i class="accordion-icon fa fa-angle-left"></i></a>
                    <ul class="sub-menu" style="display: block;">
                        <!-- Active Page -->
                        <li><a href="inicio.php">Inicio</a></li>
                        <?php 
                                if($verificar_admin == 0){
                                ?>
                        <li><a href="ver_productos.php">Productos</a></li>
                        <li><a href="administradores.php">Administradores</a></li>
                        <?php }else{
                                    ?>

                        <?php }?>

                        <li><a href="compras.php">Compras</a></li>

                    </ul>
                </li>

            </ul>
        </div>
    </div>
    <!--/ Sidebar Menu End -->
    <!--================================-->

</div>
<div class="page-header">

    <!--================================-->
    <!-- Page Header  Start -->
    <!--================================-->
    <nav class="navbar navbar-expand-lg">
        <ul class="list-inline list-unstyled mg-r-20">
            <!-- Mobile Toggle and Logo -->
            <li class="list-inline-item align-text-top"><a class="hidden-md hidden-lg" href="#"
                    id="sidebar-toggle-button"><i class="ion-navicon tx-20"></i></a></li>
            <!-- PC Toggle and Logo -->
            <li class="list-inline-item align-text-top"><a class="hidden-xs hidden-sm" href="#"
                    id="collapsed-sidebar-toggle-button"><i class="ion-navicon tx-20"></i></a></li>
        </ul>
        <!--================================-->
        <!-- Mega Menu Start -->
        <!--================================-->
        <div class="collapse navbar-collapse"></div>
        <!--/ Mega Menu End-->
        <!--/ Brand and Logo End -->
        <!--================================-->
        <!-- Header Right Start -->
        <!--================================-->
        <div class="header-right pull-right">
            <ul class="list-inline justify-content-end">



                <!--/ Notifications Dropdown End -->
                <!-- Profile Dropdown Start -->
                <!--================================-->
                <li class="list-inline-item dropdown">



                    <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="select-profile">Hola,<?php echo $Nombre_encargado;?>!</span>
                        <img src="assets/images/avatar/avatar1.png" class="img-fluid wd-35 ht-35 rounded-circle" alt="">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-profile shadow-2">
                        <div class="user-profile-area">
                            <div class="user-profile-heading">
                                <div class="profile-thumbnail">
                                    <img src="assets/images/avatar/avatar1.png"
                                        class="img-fluid wd-35 ht-35 rounded-circle" alt="">
                                </div>
                                <div class="profile-text">
                                    <h6><?php echo $Nombre_encargado;?></h6>
                                    <span><?php echo $email;?></span>
                                </div>
                            </div>
                            <a href="Perfil.php" class="dropdown-item"><i class="icon-user" aria-hidden="true"></i>
                                Perfil</a>

                            <a href="logout.php" class="dropdown-item"><i class="icon-power" aria-hidden="true"></i>
                                Cerrar sesion</a>
                        </div>
                    </div>
                </li>

            </ul>
        </div>
        <!--/ Header Right End -->
    </nav>
</div>