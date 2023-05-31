function editarUsuarios(id_usuario){

  var url = "../action/editarusuarios.php?id="+id_usuario;

  $.ajax({
      url = url,

      beforeSend: function(data){
          $("#editarUsuario").html();
        },
        success: function(data){
            $("#editarUsuario").html();
 
        },
        error: function(data){
            $("#editarUsuario").html();

        },timeout:8000
    });


}