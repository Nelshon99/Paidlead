<?php 
session_start();

include "configuracion/database.php";

$id_compras = $_SESSION["id_compra_session"];

//$id_compras = $_GET["id_compra"];

//$id_compra = 1;

$consultar_compra = $conn->prepare("SELECT * FROM compras where id ='$id_compras' ");
$consultar_compra->execute();
$consultar_compra =  $consultar_compra->fetch(PDO::FETCH_OBJ);


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
    .btn-whatsapp {
        display: block;
        width: 120px;
        height: 70px;
        color#fff;
        position: fixed;
        right: 20px;
        bottom: 0px;
        border-radius: 50%;
        line-height: 80px;
        text-align: center;
        z-index: 999;
    }
    </style>
</head>

<div id="pdf" style="margin:30px;">



    <div>
        <div class="row">

            <div class="col-md-6 col-md-offset-6">
                <center><a href="./"><img src="assets/images/logo_pequeño_1.png" style="width:250px"></a>
                </center>
            </div>
            <div class="col-md-6 col-md-offset-6">
                <center>
                    <h1 style="margin-top:15px">Factura de compra</h1>
                </center>
            </div>

        </div>
        <div style="margin-top:30px;">
            <hr>
            </hr>
            <h3> <b><i class="fa fa-caret-right"></i> Información personal</b> </h3>
            <h4><b>Nombre completo: </b> <?php echo $consultar_compra->nombre_persona; ?></h4>
            <h4><b>Teléfono: </b> <?php echo $consultar_compra->telefono; ?></h4>
            <h4><b>Email: </b> <?php echo $consultar_compra->email; ?></h4>
            <hr>
            </hr>
            <h3> <b><i class="fa fa-caret-right"></i> Información sobre la compra</b> </h3>

            <h4><b>Fecha: </b> <?php echo $consultar_compra->fecha; ?></h4>
            <h4><b>Referencia: </b> <?php echo $consultar_compra->referencia_pago; ?></h4>
            <h4><b>Estado: </b> <?php echo $consultar_compra->estado_compra; ?></h4>
            <h4><b>Total: </b> $<?php echo number_format($consultar_compra->valor_compra) ?> COP</h4>

            <div style="display:flex; justify-content:space-around;">
                <?php
                $sub_total = 0;
                $id_compra = $id_compras;
                 $consultar_producto_compra = $conn->prepare("SELECT * FROM producto_compras WHERE id_compra='$id_compra'");
                 $consultar_producto_compra->execute();
                 $consultar_producto_compra = $consultar_producto_compra->fetchAll(PDO::FETCH_ASSOC);

                foreach ($consultar_producto_compra as $producto) {

                    $id_producto = $producto["id_producto"];
                    $query_producto = $conn->prepare("SELECT * FROM productos where id = '$id_producto'");
                    $query_producto->execute();
                    $productos =  $query_producto->fetch(PDO::FETCH_OBJ);

                ?>
                <div class="card  bg-body" style="width: 100%; margin:20px 0px;">
                    <div class="card-header text-white bg-secondary border-end">
                        <b><?php echo "$productos->nombre"; ?></b>
                    </div>
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
                <?php

                }
                ?>

            </div>

        </div>
    </div>

</div>
<div class="btn-whatsapp">
    <button onclick="pdf()" class="btn btn-success btn-block mg-b-10"><i class="fa fa-download mg-r-10"></i>
        Descargar</button>
</div>
<script src="https://farmakanna.com/portal/utils/html2pdf.bundle.min.js"></script>

<script>
function pdf() {
    const nombre_doc = "Factura" + <?php echo $id_compra ?> + '.pdf';
    const $elementoParaConvertir = document.getElementById(
        "pdf"); // <-- Aquí puedes elegir cualquier elemento del DOM
    html2pdf()
        .set({
            margin: 1,
            filename: nombre_doc,
            image: {
                type: 'jpeg',
                quality: 0.98
            },
            html2canvas: {
                scale: 3, // A mayor escala, mejores gráficos, pero más peso
                letterRendering: true,
            },
            jsPDF: {
                unit: "in",
                format: "a3",
                orientation: 'portrait' // landscape o portrait
            }
        })
        .from($elementoParaConvertir)
        .save()
        .catch(err => console.log(err));
}
</script>

<!-- Footer Script -->
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


<script src="js/JsBarcode.all.min.js"></script>



</html>