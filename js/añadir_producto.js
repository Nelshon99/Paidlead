/**Funcion para añadir producto al carrito en variable session */

mostrarCantidadAgregadaP();
function agregar_carrito(id_producto, accion, unidades) {
  let unidad = parseInt(unidades);
  cantidad = document.getElementById("cantidad_producto").value;

  if (cantidad > unidad) {
    Swal.fire({
      position: "top-end",
      icon: "error",
      title: "Solo tenemos " + unidades + " unidades disponibles.",
      showConfirmButton: false,
      timer: 1500,
    });
  } else {
    var url = "action/agregar_producto_carrito.php";
    $.ajax({
      type: "POST",
      url: url,
      data: {
        id: id_producto,
        action: accion,
        cantidad: cantidad,
      },
      beforeSend: function (datos) {
        let timerInterval;
        Swal.fire({
          title: "Agregando producto",
          html: "Por favor espere....",
          timer: 100,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading();
            timerInterval = setInterval(() => {
              const content = Swal.getContent();
              if (content) {
                const b = content.querySelector("b");
                if (b) {
                  b.textContent = Swal.getTimerLeft();
                }
              }
            }, 100);
          },
          willClose: () => {
            clearInterval(timerInterval);
          },
        }).then((result) => {
          if (result.dismiss === Swal.DismissReason.timer) {
            console.log("I was closed by the timer");
          }
        });
      },
      success: function (datos) {
        $("#resultado_agregado").html(datos);
        mostrarCantidadAgregadaP();
        ocultar_producto();
      },
    });
  }
}

function ocultar_producto() {
  $("#mostrar_producto").hide();
  $("#resultado").hide();
}

function vaciar_carrito() {
  var ir_url = "action/vaciar-carrito-action.php";
  $.ajax({
    cache: false,
    async: false,
    url: ir_url,
    beforeSend: function () {
      $("#ss").html("Cargando datos espere...");
    },
    success: function (data) {
      $("#ss").html(data);
      window.location = "../paidlead/escannear-productos.php";
    },
    error: function (data) {
      $("#ss").html("ocurrio un error");
    },
  });
}

function mostrar_productos_carrito() {
  //alert("entro");
  var ir_url = "action/consultar_productos_carrito_session.php";
  $.ajax({
    cache: false,
    async: false,
    url: ir_url,
    beforeSend: function () {
      $("#productos_carrito").html("Cargando datos espere...");
    },
    success: function (data) {
      $("#productos_carrito").html(data);
    },
    error: function (data) {
      $("#productos_carrito").html("ocurrio un error");
    },
  });
}

function actualizar_cantidad(id_producto, accion) {
  // alert(id_producto);
  var url = "action/agregar_producto_carrito.php";

  cantidad = document.getElementById("producto_" + id_producto).value;
  //alert(id_producto + "-" + accion + "-" + cantidad);

  $.ajax({
    type: "POST",
    url: url,
    data: {
      id: id_producto,
      qty: cantidad,
      action: accion,
    },
    beforeSend: function (datos) {
      $("#actualizar_cantidad").html(datos);
    },
    success: function (datos) {
      $("#actualizar_cantidad").html(datos);
      mostrar_productos_carrito();
    },
  });
}

function eliminar_producto_carrito(id_producto, accion) {
  var url = "action/agregar_producto_carrito.php";
  $.ajax({
    type: "POST",
    url: url,
    data: {
      id: id_producto,
      action: accion,
    },
    beforeSend: function (datos) {
      $("#actualizar_cantidad").html(datos);
    },
    success: function (datos) {
      $("#actualizar_cantidad").html(datos);
      mostrar_productos_carrito();
    },
  });
}

function pagar_compra() {
  var url = "action/pagar_compra.php";
  $.ajax({
    type: "POST",
    url: url,
    data: $("#form-pago").serialize(),
    beforeSend: function (datos) {
      let timerInterval;
      Swal.fire({
        title: "Cargando pasarela de pago.",
        html: "Por favor espere....",
        timer: 100,
        timerProgressBar: true,
        didOpen: () => {
          Swal.showLoading();
          timerInterval = setInterval(() => {
            const content = Swal.getContent();
            if (content) {
              const b = content.querySelector("b");
              if (b) {
                b.textContent = Swal.getTimerLeft();
              }
            }
          }, 100);
        },
        willClose: () => {
          clearInterval(timerInterval);
        },
      }).then((result) => {
        if (result.dismiss === Swal.DismissReason.timer) {
          console.log("I was closed by the timer");
        }
      });
    },

    success: function (datos) {
      $("#datos_pago").html(datos);
    },
  });
}

/**Funcion para añadir cantidades */
function incrementar(cantidad) {
  //alert(cantidad);
  const cantidad2 =
    parseInt(document.getElementById("cantidad_producto").value) + 1;

  if (cantidad2 < cantidad) {
    document.getElementById("cantidad_producto").value =
      parseInt(document.getElementById("cantidad_producto").value) + 1;
  } else {
    document.getElementById("cantidad_producto").value = cantidad;
  }
}
function mostrarCantidadAgregadaP() {
  // alert("entro");
  var tabla = $.ajax({
    url: "action/consultar_pro_agragos.php",
    dataType: "text",
    async: false,
  }).responseText;
  document.getElementById("miTabla1").innerHTML = tabla;
}

function disminucion() {
  var counterValue = parseInt(
    document.getElementById("cantidad_producto").value
  );

  var newCounterValue = counterValue ? counterValue - 1 : 0;

  if (newCounterValue == 0) {
    document.getElementById("cantidad_producto").value = 1;
  } else {
    document.getElementById("cantidad_producto").value = newCounterValue;
  }
}

/** */
