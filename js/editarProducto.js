function editarProductos(id_producto) {
  //  alert(id_producto)
  var ir_url = "action/editar_productos.php?id=" + id_producto;
  $.ajax({
    cache: false,
    async: false,
    url: ir_url,
    beforeSend: function () {
      $("#editarModal").html("Cargando datos espere...");
    },
    success: function (data) {
      $("#editarModal").html(data);
    },
    error: function (data) {
      $("#editarModal").html("ocurrio un error");
    },
    timeout: 8000,
  });
}
