<?php 

include '../configuracion/database.php';
include '../action/La-carta.php';
$cart = new Cart;


if ($cart->total_items() > 0) {
 
  $cartItems = $cart->contents();  
  $p=  count($cartItems);
   $p;
?>

<style>
#scroll {
    max-height: 300px;
    overflow: auto;
}
</style>

<center>
    <h4>Productos agregados al carrito</h4>
    <hr>
    </hr>
</center>
<div>
    <h6><b>1.</b> Puedes actualizar las cantidades.</h6>
    <h6><b>2.</b> Puedes eliminar un producto de tu carrito.</h6>
    <h6><b>3.</b> Puedes ver el subtotal y el total de tu compra.</h6>
</div>
<div id="actualizar_cantidad"></div>
<div id="compra_guardada"></div>
<div id="datos_pago"></div>
<form id="form-pago">
    <input type="hidden" name="referencia" value="<?php echo rand(); ?>">
    <div id="scroll">




        <?php
              
        $suma_subtotal =0;
       
        foreach ($cartItems as $item) {
            $id_productos = $item['rowid'];
            $id_producto = $item['id'];
            $precioProducto = $item['price'];
            $cantidad = $item['qty'];
                $suma_subtotal = $precioProducto * $cantidad;
            $consultar_productos = $conn->prepare("SELECT * FROM productos WHERE id = '$id_producto'");
            $consultar_productos->execute();
            $consultar_productos = $consultar_productos->fetchAll(PDO::FETCH_ASSOC); 
            foreach($consultar_productos as $producto){ 
             
        ?>


        <div class="row row-xs clearfix">

            <div class="col-sm-12 ">
                <div class="card mg-b-20">
                    <div class="card-body pd-y-0">
                        <div class="custom-fieldset mb-4">
                            <div class="clearfix">
                                <label><?php echo $producto["nombre"] ?></label>
                            </div>
                            <div class="d-flex align-items-center text-dark">
                                <div
                                    class="wd-40 wd-md-50 ht-40 ht-md-50 mg-r-10 mg-md-r-10 d-flex align-items-center justify-content-center rounded card-icon-warning">
                                    <img style="width:27px"
                                        src="fotos/productos/<?php echo $id_producto;?>/<?php echo $producto["foto_producto"]?>"
                                        alt="">
                                </div>
                                <div>
                                    <h2 class="tx-20 tx-sm-18 tx-md-24 mb-0 mt-2 mt-sm-0 tx-normal tx-rubik tx-dark">
                                        $<span class="counter"><?php echo number_format($producto["precio"])?>
                                            COP</span><small class="tx-15">/u</small></h2>
                                    <div>
                                        <div class="d-flex align-items-center tx-gray-500"><span
                                                class="text-success mr-2 d-flex align-items-center"></span>Cantidad
                                            agregada:</div>
                                        <div class="row">
                                            <div class="col-6">
                                                <input type="number" id="<?php echo 'producto_'.$id_productos ?>"
                                                    oninput="actualizar_cantidad('<?php echo  $id_productos;?>','<?php echo 'updateCartItem';?>')"
                                                    class="form-control" name="producto[<?php echo $id_producto;?>]"
                                                    value="<?php echo  $cantidad?>">
                                            </div>
                                            <div class="col-6">
                                                <a href="javascript:void(0)" title="Eliminar producto"
                                                    onclick="eliminar_producto_carrito('<?php echo $id_productos?>','<?php echo 'removeCartItem';?>')"
                                                    class="btn btn-outline-danger btn-icon mg-r-5">
                                                    <div>X</div>
                                                </a>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="d-flex align-items-center tx-gray-500"><span
                                            class="text-success mr-2 d-flex align-items-center"></span>Subtotal:
                                        $<?php echo number_format($suma_subtotal)?> COP</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php  
          
        }
        
    
        }
        ?>

    </div>
    <div>
        <hr>
        </hr>
        <div class="row">
            <div class="col-12">

                <center>
                    <h6>Total: $<?php echo number_format($cart->total()) ?> COP</h6>
                    <input type="hidden" name="total" value="<?php echo $cart->total() ?>">
                </center>
            </div>
            <div class="col-6">
                <a href="javascript:void(0)" onclick="vaciar_carrito()"
                    class="btn btn-oblong btn-danger btn-block mg-b-10">Vaciar carrito</a>
            </div>
            <div class="col-6">
                <!--
            <a href="javascript:voi(0)" onclick="pagar_compra()"
                class="btn btn-oblong btn-success btn-block mg-b-10">Pagar compra</a>-->
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-oblong btn-success btn-block mg-b-10" data-toggle="modal"
                    data-target="#myModal2">
                    Continuar
                </button>

                <!-- Modal -->
                <div class="modal" id="myModal2" data-backdrop="static" style="z-index: 1051 !important;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myModal2">Por favor ingresa los siguientes datos
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">X</button>
                            </div>
                            <div class="modal-body">
                                <label for="">Ingresa tu nombre y apellido completo</label>
                                <input type="text" class="form-control" name="nombre">
                                <label for="">Ingresa tu teléfono</label>
                                <input type="text" class="form-control" name="telefono">
                                <label for="">Ingresa tu correo</label>
                                <input type="text" class="form-control" name="email">
                            </div>
                            <div class="modal-footer">

                                <a href="javascript:void(0)" onclick="pagar_compra()"
                                    class="btn btn-oblong btn-success btn-block mg-b-10">Pagar compra</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</form>




<?php

}else {

echo "no hay productos agregados.";
  

}

?>