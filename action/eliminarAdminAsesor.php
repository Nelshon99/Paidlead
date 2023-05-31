<?php 

include "../configuracion/database.php";


$id_admin = $_GET["id"];

$eliminar_productos = $conn->prepare("DELETE FROM administrador WHERE id= '$id_admin' ");
$eliminar_productos->execute();


echo '<div class="alert alert-success alert-bordered pd-y-15" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true"><i class="ico icon-close"></i></span>
</button>
<div class="d-sm-flex align-items-center justify-content-start">
   <i class="icon ion-ios-checkmark alert-icon tx-52 mg-r-20 tx-success"></i>
   <div class="mg-t-20 mg-sm-t-0">
      <h5 class="mg-b-2 tx-success">Eliminado correctamente.</h5>
      
    
      <a  href="https://admin.wholesale.maygelcoronel.com/administradores.php" class="btn btn-brand btn-dropbox">
      <i class="fa fa-refresh"></i><span>Actualizar</span>
      </a>
      </div>
</div>
</div>
';


?>