<?php

session_start();
include 'configuracion/database.php';

if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT * FROM administrador WHERE id = :id  ');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;
    $admin = $_SESSION['user_id'];
    if (count($results) > 0) {
        $user = $results;
    }
}
$consultar_administrador = $conn->prepare("SELECT * FROM administrador ");
$consultar_administrador->execute();
$consultar_administrador = $consultar_administrador->fetchAll(PDO::FETCH_ASSOC);
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
                            <h1 class="pd-0 mg-0 tx-20">Administrador</h1>
                        </div>
                        <div class="breadcrumb pd-0 mg-0">
                            <a class="breadcrumb-item" href="./"><i class="icon ion-ios-home-outline"></i>
                                Home</a>
                            <a class="breadcrumb-item" href="#">Inicio</a>
                            <span class="breadcrumb-item active">Administrador</span>
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
                                        Tabla Administrador
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

                                    <div id="eliminadoCliente"></div>
                                    <h5>Añadir Administrador: <a type="button" data-toggle="modal"
                                            data-target="#añadir_admin" class="btn btn-label-success btn-sm mg-y-5">

                                            <i class="fa fa-link"></i> Añadir</a></h5>

                                    <table id="basicDataTable2" class="table responsive nowrap">
                                        <thead>

                                            <tr>

                                                <th>Nombre asesor</th>
                                                <th class="text-center"> Telefono</th>
                                                <th class="text-center">Correo</th>
                                                <th class="text-center">Tipo</th>
                                                <th class="text-center">Accion</th>
                                            </tr>

                                        </thead>
                                        <tbody>

                                            <?php 
                                        foreach($consultar_administrador as $usuarios){

                                        ?>


                                            <tr>

                                                <td><?php echo $usuarios["nombre_asesor"];?></td>
                                                <td class="text-center"><?php echo $usuarios["telefono"];?></td>
                                                <td class="text-center"><?php echo $usuarios["email"];?></td>
                                                <td class="text-center"><?php
                                                    
                                                   if($usuarios["admin"] >0){
                                                       echo "Asesor";
                                                   }else{
                                                       echo "Administrador";
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <!-- <a href="#"
                                                        onclick="editarUsuarios('<?php echo $usuarios['id']; ?>','<?php echo '2' ?>')"
                                                        title="Editar" data-toggle="modal" data-target="#editarUsuarios"
                                                        class="btn btn-label-primary btn-sm mg-y-5"><i
                                                            class="fa fa-pencil"></i> Editar</a>-->
                                                    <a href="#"
                                                        onclick="eliminarAdminAsesor('<?php echo $usuarios['id']; ?>')"
                                                        class="btn btn-label-danger btn-sm mg-y-5"><i
                                                            class="fa fa-trash"></i> Eliminar</a>
                                                </td>
                                            </tr>
                                            <?php 
                                    }
                                        ?>




                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Nombre asesor</th>
                                                <th class="text-center">Telefono</th>
                                                <th class="text-center"> Correo</th>
                                                <th class="text-center">Tipo</th>
                                                <th class="text-center">Accion</th>

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

    <div class="modal" tabindex="-1" id="añadir_admin">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Añadir Admin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="action/agregar_asesor_admin.php" method="POST">
                        <div class="modal-body">




                            <div class="row no-gutters">

                                <div class="col-6 col-sm-6">
                                    <label for="recipient-name" class="col-form-label">Nombre asesor:</label>
                                    <input type="text" class="form-control" id="recipient-name" name="nombre_asesor">
                                </div>

                                <div class="col-6 col-sm-6">
                                    <label for="message-text" class="col-form-label">Telefono:</label>
                                    <input type="text" class="form-control" id="recipient-name" name="telefono">
                                </div>

                                <div class="col-6 col-sm-6">
                                    <label for="message-text" class="col-form-label">Email</label>
                                    <input type="text" class="form-control" id="recipient-name" name="email">
                                </div>


                                <div class="col-6 col-sm-6">
                                    <label for="message-text" class="col-form-label">Contraseña</label>
                                    <input type="password" class="form-control" id="recipient-name" name="password">
                                </div>

                                <div class="col-12 col-sm-12">
                                    <label for="message-text" class="col-form-label">Tipo de usuario</label>
                                    <select class="form-control select2" data-placeholder="Choose one"
                                        data-parsley-class-handler="#slWrapper"
                                        data-parsley-errors-container="#slErrorContainer" name="admin" required>
                                        <option label="Seleccionar"></option>

                                        <option value="0">Administrador</option>

                                    </select>
                                </div>



                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                    aria-label="Close">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Agregar</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

</body>



<script>
function edita(id_usuario, opcion) {

    var ir_url = "action/editarusuarios.php?id=" + id_usuario + "&opcion=" + opcion;

    $.ajax({
        cache: false,
        async: false,
        url: ir_url,
        beforeSend: function() {
            $("#editarUsuario").html("Cargando datos espere...");
        },
        success: function(data) {
            $("#editarUsuario").html(data);
        },
        error: function(data) {
            $("#editarUsuario").html("ocurrio un error");
        },
        timeout: 8000
    });


}

function eliminarAdminAsesor(id_usuario) {

    var retVal = confirm("¿Seguro desea continuar?");
    if (retVal == true) {
        var ir_url = "action/eliminarAdminAsesor.php?id=" + id_usuario;

        $.ajax({
            cache: false,
            async: false,
            url: ir_url,
            beforeSend: function() {
                $("#eliminadoCliente").html("Cargando datos espere...");
            },
            success: function(data) {
                $("#eliminadoCliente").html(data);
            },
            error: function(data) {
                $("#eliminadoCliente").html("ocurrio un error");
            },
            timeout: 8000
        });
    }

}
</script>
<script>
function agregar_clientes() {

    var ir_url = "action/agregar_cliente.php";

    $.ajax({
        url = ir_url,
        beforeSend: function(data) {
            $("#añadir_clientes").html("Cargando datos espere...");
        },
        success: function(data) {
            $("#añadir_clientes").html(data);

        },
        error: function(data) {
            $("#añadir_clientes").html("ocurrio un error");
        },
        timeout: 8000


    });

}
</script>



<?php include "footers/footer.php" ?>

<?php }else{
echo"<script language='javascript'>window.location='index.php'</script>;";

} ?>