function agregarProducto() {

    var url_peticion = "action/guardar-productos-action.php";

    $.ajax({

        type: 'POST',
        url: url_peticion,
        data: new FormData($("#form_agregar_producto")[0]),
        contentType: false,
        processData: false,

        beforeSend: function() {
            $("#mensaje_guardar_producto").html("Cargando, por favor espere...");
        },
        success: function(data) {
            $("#mensaje_guardar_producto").html(data);
        },
        error: function() {
            alert("Por favor vuelvelo a intentar más tarde");
        }



    });

}

/** generador de codigo */

/*function datos() {

    var codigo = document.getElementById("codigo").value;

    JsBarcode("#canvas", codigo, {
        fontSize: 12,
       
lineColor: "black",
    margin: 20,
    marginLeft: 40
});


}

function descargar() {

    var canvas = document.getElementById("canvas");
    var filename = prompt("Guardar como...", "Nombre del archivo");
    if (canvas.msToBlob) { //para internet explorer
        var blob = canvas.msToBlob();
        window.navigator.msSaveBlob(blob, filename + ".png"); // la extensión de preferencia pon jpg o png
    } else {
        link = document.getElementById("download");
        //Otros navegadores: Google chrome, Firefox etc...
        link.href = canvas.toDataURL("image/png"); // Extensión .png ("image/png") --- Extension .jpg ("image/jpeg")
        link.download = filename;
    }
} */