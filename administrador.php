<?php

session_start();
require 'configuracion/database.php';

if (isset($_SESSION['user_id'])) {
  header('Location: inicio.php');
}


if (!empty($_POST['email']) && !empty($_POST['password'])) {
  $records = $conn->prepare('SELECT id, email, password FROM administrador WHERE email = :email');
  $records->bindParam(':email', $_POST['email']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);

  $message = '';

  if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
    $_SESSION['user_id'] = $results['id'];
    header("Location:  inicio.php");
  } else {
    $message = 'Lo siento, esas credenciales no coinciden';
  }
}

?>


<?php include "headers/header_sesion.php"?>

<body>
    <!--================================-->
    <!-- User Singin Start -->
    <!--================================-->
    <div class="ht-100v d-flex">
        <div class="card shadow-none pd-20 mx-auto wd-400 text-center bd-1 align-self-center">
            <a href="./">
                <img src="assets/images/imagen_inicio_sesion.png" style="width: 350px;">
            </a>
            <h4 class="card-title mt-3 text-center">Iniciar sesión</h4>

            <form action="administrador.php" method="POST">
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text pd-x-9"> <i class="fa fa-envelope"></i> </span>
                    </div>
                    <input class="form-control form-control-sm" placeholder="Email" name="email" type="email">
                </div>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <input class="form-control form-control-sm" placeholder="Contraseña" name="password"
                        type="password">
                </div>
                <!-- <p class="text-center"><a href="page-password.html">Contraseña olvidada?</a></p>-->
                <div class="form-group">
                    <button type="submit" class="btn btn-custom-primary btn-block tx-13 hover-white"> Login </button>
                </div>
                <!-- <a href="page-singup.html">Crear cuenta
                        administrador</a> </p>-->
            </form>
        </div>
    </div>

</body>

<?php include "footers/footer_sesion.php" ?>

</html>