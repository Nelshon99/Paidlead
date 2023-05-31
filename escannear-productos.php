<?php 

session_start();

?>
<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from colorlib.net/metrical/light/page-singin.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 05 Jan 2020 21:19:37 GMT -->

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
    <link type="text/css" rel="stylesheet" href="assets/plugins/simple-line-icons/css/simple-line-icons.css">
    <link type="text/css" rel="stylesheet" href="assets/plugins/ionicons/css/ionicons.css">
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

    <style>
    #contenedor video {
        max-width: 100%;
        width: 100%;
    }

    #contenedor {
        max-width: 100%;
        position: relative;
    }

    canvas {
        max-width: 100%;
    }

    canvas.drawingBuffer {
        position: absolute;
        top: 0;
        left: 0;
    }
    </style>
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
                    <a href="./"><i data-feather="home"></i>
                        <span>Inicio</span></a>

                </li>

                <li class="open">
                    <a href="#"><i data-feather="help-circle"></i>
                        <span>Ayuda</span></a>

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
                <li class="list-inline-item align-middle"> <a href="#"><i data-feather="help-circle"></i>
                        <span>Ayuda</span></a></li>



            </ul>
        </div>
        <!--/ Header Right End -->
    </nav>
</div>

<div class="page-container">

    <div class="page-content">
        <div class="page-inner">
            <!-- Main Wrapper -->
            <div id="main-wrapper">

                <div class="row mg-b-20 pd-20 no-gutters bg-white clearfix">
                    <div class="col-md-12 col-xl-12">
                        <div class="card card-accent-primary  mg-15">

                            <div class="card-header">
                                <div class="row">

                                    <div class="col-10">
                                        Bienvenido a
                                        <img class="desktop-logo" src="assets/images/logo_pequeño_1.png" alt=""
                                            style="width:100px">
                                    </div>
                                    <div class="col-2">
                                        <a id="myBtn" href="javascript:mostrar_productos_carrito()"
                                            style="margin-left:0px; margin-top: 8px; color:black;">
                                            <span
                                                style="margin-top: 8px; color:black; position: absolute; margin-left: 9px; font-size: 12px;"
                                                id="miTabla1"></span>

                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="black"
                                                class="bi bi-bag" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>




                            </div>


                            <div class="card-body">
                                <h5 class="card-title">¡Por favor colocar el codigo dentro del lector!</h5>
                                <label for="">Codigo escaneado:</label>
                                <input type="text" disabled class="form-control" onblur="alerta()" value=""
                                    id="resultado" name="codigo_producto">

                                <div id="mostrar_producto"></div>
                                <div id="resultado_agregado"></div>

                                <p>Escanner: </p>
                                <div id="contenedor"></div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


        </div>

    </div>
</div>


<!-- Page Footer Start -->

<!-- The Modal -->
<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <span style="font-size:13px;" class="close">Agregar otro producto</span><br>
        <div id="productos_carrito"></div>
    </div>

</div>


<style>
/* The Modal (background) */
.modal {
    display: none;
    /* Hidden by default */
    position: fixed;
    /* Stay in place */
    z-index: 1050;
    /* Sit on top */
    padding-top: 0px;
    /* Location of the box */
    left: 0;
    top: 0;
    width: 100%;
    /* Full width */
    height: 100%;
    /* Full height */
    overflow: auto;
    /* Enable scroll if needed */
    background-color: rgb(0, 0, 0);
    /* Fallback color */
    background-color: rgba(0, 0, 0, 0.4);
    /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 10px;
    border: 1px solid #888;
    width: 100%;
    height: 100%;
}

/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

/* The Close Button */
.close2 {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
</style>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
<!--================================-->
<footer class="page-footer">
    <div class="pd-t-4 pd-b-0 pd-x-20">
        <div class="tx-10 tx-uppercase">
            <p class="pd-y-10 mb-0">Copyright&copy; 2021 | All rights reserved. | Created By <a href="#"
                    target="_blank">PAIDLEAD</a></p>
        </div>
    </div>
</footer>
<!--/ Page Footer End -->
</div>
<!--/ Page Content End -->
</div>
<!--/ Page Container End -->
<!--================================-->
<!-- Scroll To Top Start-->
<!--================================-->
<a href="#" data-click="scroll-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>



<!-- Footer Script -->
<script type="text/javascript" src="https://checkout.wompi.co/widget.js"></script>
<!--================================-->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<script src="assets/plugins/jquery-ui/jquery-ui.js"></script>
<script src="assets/plugins/popper/popper.js"></script>
<script src="assets/plugins/feather-icon/feather.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/plugins/pace/pace.min.js"></script>
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables/responsive/dataTables.responsive.js"></script>
<script src="assets/plugins/datatables/extensions/dataTables.jqueryui.min.js"></script>
<script src="assets/plugins/simpler-sidebar/jquery.simpler-sidebar.min.js"></script>
<script src="assets/js/jquery.slimscroll.min.js"></script>
<script src="assets/js/highlight.min.js"></script>
<script src="assets/js/app.js"></script>
<script src="assets/js/custom.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="js/editarProducto.js"></script>
<script src="js/eliminar_variante.js"></script>
<script src="js/editarUsuarios.js"></script>
<script src="js/agregarProducto.js"></script>
<script src="js/lector_codigo.js"></script>
<script src="js/añadir_producto.js"></script>



<script src="js/JsBarcode.all.min.js"></script>

<script src="https://unpkg.com/quagga@0.12.1/dist/quagga.min.js"></script>



</html>