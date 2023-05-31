<?php
date_default_timezone_set("America/Lima");
// Iniciamos la clase de la carta
include '../action/La-carta.php';
$cart = new Cart;

// include database configuration file
include "../configuracion/database_carrito.php";


if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){
    if($_REQUEST['action'] == 2 && !empty($_REQUEST['id'])){
        $productID = $_POST['id'];
        $cantidad = $_POST['cantidad'];
        $query = $conn->query("SELECT * FROM productos WHERE id = ".$productID);
        $row = $query->fetch_assoc();


        $itemData = array(
            'id' => $row['id'],
            'name' => $row['nombre'],
            'price' => $row['precio'],
            'qty' => $cantidad
        );
        
        $insertItem = $cart->insert($itemData);
        $redirectLoc = $insertItem?'inicio.php#portfolio':'index.php';
        //header("Location: ".$redirectLoc);

echo '<script>
      
        Swal.fire({
  position: "top-end",
  icon: "success",
  title: "Producto agregado correctamente.",
  showConfirmButton: false,
  timer: 1500
})
    </script>';
    }else if($_REQUEST['action'] == 'updateCartItem' && !empty($_REQUEST['id'])){
        $itemData = array(
          'rowid' => $_REQUEST['id'],
         'qty' => $_REQUEST['qty']
        );

//var_dump( $itemData);
   
       $updateItem = $cart->update($itemData);

     
        if($updateItem == null){

    
          echo '<script>
      
        Swal.fire({
  position: "top-end",
  icon: "error",
  title: "Error al actualziar",
  showConfirmButton: false,
  timer: 1500
})
    </script>'; 
        }else{
            echo '<script>
      
        Swal.fire({
  position: "top-end",
  icon: "success",
  title: "Cantidad actualizada correctamente.",
  showConfirmButton: false,
  timer: 1500
})
    </script>'; 
        }
       
    }else if($_REQUEST['action'] == 'removeCartItem' && !empty($_REQUEST['id'])){
     
       //$cart->destroy();
       
       $deleteItem = $cart->remove($_REQUEST['id']);

       
            
  if($deleteItem == null){
        echo '<script>
      
        Swal.fire({
  position: "top-end",
  icon: "error",
  title: "Error al eliminar el producto.",
  showConfirmButton: false,
  timer: 1500
})
    </script>';
    }else{
        echo '<script>
      
        Swal.fire({
  position: "top-end",
  icon: "success",
  title: "Producto eliminado correctamente.",
  showConfirmButton: false,
  timer: 1500
})
    </script>'; 
    }
        //echo $id = $_REQUEST['id'];
     
       
       // header("Location: ../tienda");
        

    }
    elseif($_REQUEST['action'] == 'placeOrder' && $cart->total_items() > 0 && !empty($_SESSION['sessCustomerID'])){
        // insert order details into database
        $insertOrder = $db->query("INSERT INTO orden (customer_id, total_price, created, modified) VALUES ('".$_SESSION['sessCustomerID']."', '".$cart->total()."', '".date("Y-m-d H:i:s")."', '".date("Y-m-d H:i:s")."')");
        
        if($insertOrder){
            $orderID = $db->insert_id;
            $sql = '';
            // get cart items
            $cartItems = $cart->contents();
            foreach($cartItems as $item){
                $sql .= "INSERT INTO orden_articulos (order_id, product_id, quantity) VALUES ('".$orderID."', '".$item['id']."', '".$item['qty']."');";
            }
            // insert order items into database
            $insertOrderItems = $db->multi_query($sql);
            
            if($insertOrderItems){
                $cart->destroy();
               header("Location: OrdenExito.php?id=$orderID");
            }else{
                //header("Location: Pagos.php");
            }
        }else{
           // header("Location: Pagos.php");
        }
    }else{
       // header("Location: index.php");
    }
}else{
   // header("Location: index.php");
}

?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>