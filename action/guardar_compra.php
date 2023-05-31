<?php
session_start();
include "../configuracion/database.php";
include 'PHPMailer/PHPMailerAutoload.php';
/*use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
$dirPrincipal = '..';
require "$dirPrincipal/phpmailer/src/Exception.php";
require "$dirPrincipal/phpmailer/src/PHPMailer.php";
require "$dirPrincipal/phpmailer/src/SMTP.php";*/

$nombre = $_POST["nombre"];
$telefono = $_POST["telefono"];
$email = $_POST["email"];
$total = $_POST["total"];
$fechaPedido = $_POST["fechaPedido"];
$referencia = $_POST["referencia"];

$guardar_compra = $conn->prepare("INSERT INTO compras (nombre_persona,telefono,email,valor_compra,referencia_pago,estado_compra,fecha)
VALUES ('$nombre','$telefono','$email','$total','$referencia','PAGADO','$fechaPedido')");
$guardar_compra->execute();

if($guardar_compra == null){

}else{
    
echo "

<script>

Swal.fire({
    position: 'top-end',
    icon: 'success',
    title: 'Compra registrada correctamente.',
    showConfirmButton: false,
    timer: 1500
  })
</script>

";


}


$consultar_compra = $conn->prepare("SELECT * FROM compras WHERE referencia_pago = '$referencia'");
$consultar_compra->execute();
$consultar_compra = $consultar_compra->fetchAll(PDO::FETCH_ASSOC);
$resta = 0;
foreach($consultar_compra as $compra){
    $id_compras = $compra["id"];
   
}
 $_SESSION["id_compra_session"] =  $id_compras;
$producto = $_POST["producto"];

foreach($producto as $id_producto => $cantidad){
 $id_producto;
 $cantidad;
$id_compra = $id_compras;


$consultar_stock = $conn->prepare("SELECT * FROM productos WHERE id = '$id_producto'");
    $consultar_stock->execute();
    $consultar_stock = $consultar_stock->fetchAll(PDO::FETCH_ASSOC);

    foreach($consultar_stock as $stock){
        $cantidad_stock = $stock["stock"];
        $resta = $cantidad_stock - $cantidad;
    }

 $guardar_producto_compra = $conn->prepare("INSERT INTO producto_compras (id_producto,cantidad_producto,fecha,id_compra)
 VALUES('$id_producto','$cantidad','$fechaPedido','$id_compra')");
 $guardar_producto_compra->execute();

 if($guardar_compra == null){
 echo "error al guardar producto a tu compra.";
}else{
    //resta de stock


 $actualizar_stock = $conn->prepare("UPDATE productos SET stock='$resta' WHERE id = '$id_producto'");
 $actualizar_stock->execute();

}
 
}


//enviar correo
if($guardar_compra == null){

}else{

  
    $mail_addAddress_ASESOR = $email;
    $txt_message2 = '<!DOCTYPE html>
       <html>
       <head>
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <style>
       .card {
         box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
         max-width: 300px;
         margin: auto;
         text-align: center;
         font-family: arial;
       }
       
       .title {
         color: grey;
         font-size: 18px;
       }
       
       button {
         border: none;
         outline: 0;
         display: inline-block;
         padding: 8px;
         color: white;
         background-color: #000;
         text-align: center;
         cursor: pointer;
         width: 100%;
         font-size: 18px;
       }
       
       a {
          border: none;
         outline: 0;
         display: inline-block;
         padding: 8px;
         color: white;
         background-color: #000;
         text-align: center;
         cursor: pointer;
         width: 100%;
         font-size: 18px;
       }
       
       button:hover, a:hover {
         opacity: 0.7;
       }
       </style>
       </head>
       <body>
       
       <div class="card">
         <img src="../assets/images/logo.png"  style="width:300px">
         <h1>¡Hola  '.$nombre.'!</h1>
         <h3>Tu información ingresada fue la siguiente:</h3>
         <h5><b>Nombres y apellidos: </b>'.$nombre.'</h5>
         <h5><b>Teléfono: </b>'.$telefono.'</h5>
         <h5><b>Correo: </b>'.$email.'</h5>
         <hr></hr>
         <a href="https://paidlead.online/compra_finalizada.php?id_compra='.$id_compra.'" class="button">Ver factura de compra</a>
         
         </div>
       </body>
       </html>';
    
       $mail_username = "paidlead2021@gmail.com";
       $mail_userpassword = "Paidlead2021@";
       $mail_setFromEmail = "paidlead2021@gmail.com";
       $mail_setFromName = "Factura de tu compra Paidlead";
       $mail_subject = "Detalles de tu factura";
       $mail = new PHPMailer;
       $mail->isSMTP();                         // Establecer el correo electrónico para utilizar SMTP
       $mail->Host = 'smtp.gmail.com';             // Especificar el servidor de correo a utilizar
       $mail->SMTPAuth = true;                     // Habilitar la autenticacion con SMTP
       $mail->Username = $mail_username;          // Correo electronico saliente ejemplo: tucorreo@gmail.com
       $mail->Password = $mail_userpassword;         // Tu contraseña de gmail
       $mail->SMTPSecure = 'ssl';                  // Habilitar encriptacion, `ssl` es aceptada
       $mail->Port = 465;                          // Puerto TCP  para conectarse
       $mail->setFrom($mail_setFromEmail, $mail_setFromName);//Introduzca la dirección de la que debe aparecer el correo electrónico. Puede utilizar cualquier dirección que el servidor SMTP acepte como válida. El segundo parámetro opcional para esta función es el nombre que se mostrará como el remitente en lugar de la dirección de correo electrónico en sí.
       $mail->addReplyTo($mail_setFromEmail, $mail_setFromName);//Introduzca la dirección de la que debe responder. El segundo parámetro opcional para esta función es el nombre que se mostrará para responder
       $mail->addAddress($mail_addAddress_ASESOR);   // Agregar quien recibe el e-mail enviado
       $message = str_replace('{{first_name}}', $mail_setFromName, $message);
       $message = str_replace('{{message}}', $txt_message2, $message);
       $message = str_replace('{{customer_email}}', $mail_setFromEmail, $message);
       $mail->isHTML(true);  // Establecer el formato de correo electrónico en HTML
       $mail->CharSet = 'UTF-8';
       $mail->Subject = $mail_subject;
       $mail->msgHTML($txt_message2);
       $mail->send();
}



?>