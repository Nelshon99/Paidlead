<?php 
date_default_timezone_set('America/Bogota');
include "../configuracion/database.php";

session_start();

$nom_producto = $_POST["producto"];
$nombre = $_POST["nombre"];
$telefono = $_POST["telefono"];
$email = $_POST["email"];
$fecha_pedido = date("Y-m-d H:i:s");

if($nom_producto == null){
    $error = "error";
    $mensaje = "No hay ningun producto agregado";
    $entro=0;
}else if($nombre == null){
    $error = "error";
    $mensaje = "Por favor ingresa tu nombre completo";
    $entro=0;
}else if($telefono == null){
    $error = "error";
    $mensaje = "Por favor ingresa tu teléfono";
    $entro=0;
}else if($email == null){
    $error = "error";
    $mensaje = "Por favor ingresa tu email";
    $entro=0;
}else{

$referencia = $_POST["referencia"];
$consulat_pasarela = $conn->prepare("SELECT * FROM pasarela_pago WHERE id = 1 ");
$consulat_pasarela->execute();
$consulat_pasarela = $consulat_pasarela->fetchAll(PDO::FETCH_ASSOC);
foreach($consulat_pasarela as $pasarela){
    $public_key = $pasarela["PublicKey"];
    $currency_cop = $pasarela["Currency"];
    $Redirect_Url = $pasarela["RedirectUrl"];
}

$publickey = $public_key;
$currency =  $currency_cop ;
$total = $_POST["total"];
$descripcion ="hola";
$RedirectUrl = "http://localhost/paidlead/escannear-productos.php";
?>

<div id="muestra2"> </div>
<script type="text/javascript" src="https://checkout.wompi.co/widget.js"></script>

<input type="hidden" id="data-public-key" name="data-public-key" class="btn mb-3" value="<?php echo $publickey;?>">
<input type="hidden" id="data-currency" name="data-currency" class="btn mb-3" value="<?php echo $currency;?>">
<input type="hidden" id="data-amount-in-cents" name="data-amount-in-cents" class="btn mb-3"
    value="<?php echo  $total . "00";?>">
<input type="hidden" id="data-reference" name="data-reference" class="btn mb-3" value="<?php echo $referencia;?>">
<input type="hidden" id="data-description" name="data-description" class="btn mb-3" value="<?php echo $descripcion;?>">

<input type="hidden" id="data-redirect-url" name="data-redirect-url" class="btn mb-3"
    value="<?php echo $RedirectUrl;?>">


<script>
widgetWompi();

function widgetWompi() {

    let checkout = new WidgetCheckout({

        currency: document.getElementById("data-currency").value,
        amountInCents: document.getElementById("data-amount-in-cents").value,
        reference: document.getElementById("data-reference").value,
        description: document.getElementById("data-description").value,
        publicKey: document.getElementById("data-public-key").value,
        redirectUrl: document.getElementById("data-redirect-url").value

    });

    checkout.open(function(result) {
        let transaction = result.transaction;

        if (transaction.status !== 'APPROVED') {
            alert("Por favor utiliza otro medio de pago.");
        } else {
            alert("Pago aprobado.");
            guardarCompra();
        }
    });
}

function guardarCompra() {
    var url = "action/guardar_compra.php";
    $.ajax({
        type: "POST",
        url: url,
        async: false,
        data: $("#form-pedido").serialize(),

        beforeSend: function() {
            $("#compra_guardada").html();
        },
        success: function(datos) {
            $("#compra_guardada").html(datos);
            // widgetWompi();
            redireccionar();
            //vaciar_carrito();
        }
    });

}

function vaciar_carrito() {
    var url = "vaciar-carrito-action.php";

    $.ajax({
        type: "POST",
        url: url,


        beforeSend: function() {
            $("#sss").html();
        },
        success: function(datos) {

            $('#sssss').html(datos);

        }
    });
}

function redireccionar() {
    setInterval(function() {
        var url = "action/vaciar-carrito-action.php";

        $.ajax({
            type: "POST",
            url: url,


            beforeSend: function() {
                $("#muestra").html();
            },
            success: function(datos) {

                $('#muestra').html(datos);

                window.location = "compra_finalizada.php";



            }
        });
    }, 1500);
}
</script>




<form id="form-pedido">

    <?php 

?>
    <input type="hidden" name="nombre" value="<?php echo $nombre ?>">
    <input type="hidden" name="telefono" value="<?php echo $telefono ?>">
    <input type="hidden" name="email" value="<?php echo $email ?>">
    <input type="hidden" name="total" value="<?php echo $total ?>">
    <input type="hidden" name="fechaPedido" value="<?php echo $fecha_pedido ?>">
    <input type="hidden" name="referencia" value="<?php echo $referencia ?>">
    <?php 
foreach($nom_producto as $id => $value){

      
    
    $id;//id producto
   $value ;//cantidad
    
?>

    <input type="hidden" name="producto[<?php echo $id?>]" value="<?php echo $value ?>">
    <?php 
  
$entro=1;
    }

}


echo "

<script>

if('$entro' != 1){
Swal.fire({
    position: 'top-end',
    icon: '$error',
    title: '$mensaje',
    showConfirmButton: false,
    timer: 1500
  })

}
</script>

";
    
?>

</form>