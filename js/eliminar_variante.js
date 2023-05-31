function eliminar(id_variante, id_producto) {
  var ir_url = "action/eliminar_variante.php?id=" + id_variante;
  $.ajax({
    cache: false,
    async: false,
    url: ir_url,
    beforeSend: function () {
      $("#mostrar_id").html("Cargando datos espere...");
    },
    success: function (data) {
      editarProducto(id_producto);
      $("#mostrar_id").html(data);
    },
    error: function (data) {
      $("#mostrar_id").html("ocurrio un error");
    },
    timeout: 8000,
  });
}

function editarProducto(id_producto) {
  var ir_url = "../action/editar_productos.php?id=" + id_producto;
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
