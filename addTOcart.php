<?php 
  
 // remove from sessions 
if (isset($_POST['action']) && $_POST['action'] == 'delete_from_sessions') {
	$id = $_POST['proid'];

  session_start();

$session_products = explode(",",$_SESSION['products']);

$deleteKey = array_search($id , $session_products);

unset($session_products[$deleteKey]);

if ($session_products == '') {
  $_SESSION['products'] = '';
}
else{
  $_SESSION['products'] = implode(",",$session_products);

}





// echo $_SESSION['products'];
  echo json_encode(['message'=>'Delete from Cart successfully!','result'=>'success','data'=>$_SESSION["products"]]);

  exit();
}

  if($_POST['product']){
  $productid=$_POST['product']; 
  session_start();
  if(isset($_SESSION["products"]))	
  $_SESSION["products"].=','.$productid;
  else
  $_SESSION["products"]=$productid;	
  echo json_encode(['message'=>'add to cart successfully!','result'=>'success','data'=>$_SESSION["products"]]);

  exit();
	}



 ?>