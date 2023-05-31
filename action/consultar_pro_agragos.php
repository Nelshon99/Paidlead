<?php 

include '../action/La-carta.php';

$cart = new Cart;
  $cartItems = $cart->contents();  

if ($cart->total_items() > 0) {
 

  $p=  count($cartItems);
  echo $p;
  echo '<script>
      
  Swal.fire({
position: "top-end",
icon: "error",
title: "Error al actualziar",
showConfirmButton: false,
timer: 1500
})
</script>'; 
}else {

echo 0;
  

}

?>