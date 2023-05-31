<!-- consultas bd -->
<?php
include "configuracion/database.php";
$consultar_categorias_p = $conn->prepare("SELECT * FROM categorias_p ");
$consultar_categorias_p->execute();
$consultar_categorias_p = $consultar_categorias_p->fetchAll(PDO::FETCH_ASSOC);
?>




<!-- modal editar productos -->

<div class="modal fade" id="editar_producto" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel_7">Editar producto</h5>
                <a type="button" href="../ver_productos.php" class="close" aria-label="Close">
                    <span aria-hidden="true"><i class="ion-ios-close-empty"></i></span>
                </a>
            </div>

            <div id="editarModal"></div>

        </div>

    </div>
</div>



<!-- modal para editar  usuarios -->
<div class="modal fade show" id="editarUsuarios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel_4"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel_4">Editar clientes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="ion-ios-close-empty"></i></span>
                </button>
            </div>
            <div class="modal-body">

                <div id="editarUsuario"></div>
            </div>


        </div>
    </div>
</div>


<!--modal para mostrar los detalles del pedido-->
<div class="modal fade" id="ver_detalles_pedidos" role="dialog" aria-labelledby="s" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detalles del pedido</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="ver_detalles_pedido">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

            </div>
        </div>
    </div>
</div>


<!-- modal para añadir productos a la plataforma-->


<div class="modal fade" id="añadir_productos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel_4"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel_4">Agregar nuevo producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="ion-ios-close-empty"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <div id="mensaje_guardar_producto"></div>
                <form id="form_agregar_producto" enctype=" multipart/form-data">

                    <div class="row">

                        <div class="col-6 col-sm-6">
                            <label for="recipient-name" class="col-form-label">Categoria</label>
                            <select name="categoria" id="categoria" class="form-control">
                                <option value="">Seleccione una categoría</option>
                                <?php 
                               foreach ($consultar_categorias_p as $categorias){
                              ?>

                                <option value="<?php echo $categorias["nombre"] ?>"><?php echo $categorias["nombre"]?>
                                </option>
                                <?php 
                               }
                              ?>
                            </select>
                        </div>

                        <div class="col-6 col-sm-6">
                            <label for="message-text" class="col-form-label">Nombre:</label>
                            <input type="text" class="form-control" id="recipient-name" name="nombre">
                        </div>


                        <div class="col-6 col-sm-6">
                            <label>Precio unidad</label>
                            <input type="text" class="form-control" id="recipient-name" name="precio">
                        </div>

                        <div class="col-6 col-sm-6">
                            <label>Cantidad stock</label>
                            <input type="text" class="form-control" id="recipient-name" name="cantidad_stcok">
                        </div>


                        <div class="col-6 col-sm-6">
                            <label>Descripción</label>
                            <input type="text" class="form-control" id="recipient-name" name="descripcion">
                        </div>

                        <div class="col-6 col-sm-6">
                            <label>Código del producto</label>
                            <input type="text" class="form-control" placeholder="Por escriba un código"
                                name="codigo_barra">


                        </div>

                        <div class="col-6 col-sm-6">
                            <label>Foto del producto</label>
                            <input type="file" class="form-control" name="foto_producto">
                        </div>
                        <div class="col-6 col-sm-6">
                            <label>Estado del producto</label>
                            <select class="form-control" name="estado" id="estado">

                                <option value="1" selected>Activado</option>
                                <option value="0">Desactivado</option>

                            </select>
                        </div>



                        <div class="modal-footer">
                            <center> <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                    aria-label="Close">Cancelar</button>
                                <a href="javascript:void(0)" onclick="agregarProducto()" class="btn btn-primary">Guardar
                                    producto</a>
                            </center>
                        </div>

                </form>
            </div>

        </div>
    </div>
</div>

<!--modal para agregar cliente-admin -->
<div class="modal fade" id="añadir_cliente" role="dialog" aria-labelledby="s" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Añadir cliente/admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="action/agregar_cliente.php" method="POST">
                    <div class="modal-body">



                        <div class="row">
                            <div class="col-12 col-sm-12">
                                <div class="row">


                                    <div class="col-3 col-sm-3">
                                        <label for="recipient-name" class="col-form-label">Nombre empresa:</label>
                                        <input type="text" class="form-control" id="recipient-name" name="nombreEm">
                                    </div>

                                    <div class="col-3 col-sm-3">
                                        <label for="message-text" class="col-form-label">Nombre encargado:</label>
                                        <input type="text" class="form-control" id="recipient-name" name="personaC">
                                    </div>

                                    <div class="col-3 col-sm-3">
                                        <label for="message-text" class="col-form-label">Cedula o Nit</label>
                                        <input type="text" class="form-control" id="recipient-name" name="cedula">
                                    </div>


                                    <div class="col-3 col-sm-3">
                                        <label for="message-text" class="col-form-label">Correo</label>
                                        <input type="text" class="form-control" id="recipient-name" name="email">
                                    </div>
                                    <div class="col-3 col-sm-3">
                                        <label for="message-text" class="col-form-label">Telefono</label>
                                        <input type="text" class="form-control" id="recipient-name" name="telefono">
                                    </div>

                                    <div class="col-3 col-sm-3">
                                        <label for="message-text" class="col-form-label">Pais</label>
                                        <input type="text" class="form-control" id="recipient-name" name="pais">
                                    </div>


                                    <div class="col-3 col-sm-3">
                                        <label for="message-text" class="col-form-label">Ciudad</label>
                                        <input type="text" class="form-control" id="recipient-name" name="ciudad">
                                    </div>

                                    <div class="col-3 col-sm-3">
                                        <label for="message-text" class="col-form-label">Direccion</label>
                                        <input type="text" class="form-control" id="recipient-name" name="direccion">
                                    </div>

                                    <div class="col-3 col-sm-3">
                                        <label for="message-text" class="col-form-label">Codigo postal</label>
                                        <input type="text" class="form-control" id="recipient-name" name="codigo">
                                    </div>

                                    <div class="col-3 col-sm-3">
                                        <label for="message-text" class="col-form-label">Contraseña</label>
                                        <input type="password" class="form-control" id="recipient-name"
                                            name="contraseña">
                                    </div>





                                </div>
                            </div>

                        </div>


                    </div>

                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" data-dismiss="modal"
                            aria-label="Close">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Agregar</button>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- agregar admin/asesor-->

<div class="modal fade" id="" role="dialog" aria-labelledby="aa" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Añadir Admin/Asesor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="action/actualizar_admin.php" method="POST">
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
                                <input type="text" class="form-control" id="recipient-name" name="password">
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