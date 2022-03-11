<?php 
include 'admin/includes/conn.php';
session_start();
 $total=0; 
    $tq=0;
  $user_id = $_SESSION['id'];
  $qy =[];
  if($_POST['submit'])
  {
    $name = $_POST['customer_name'];
    $customer_email = $_POST['customer_email'];
    $cust_address = $_POST['cust_address'];
    $customer_phone = $_POST['phone'];
    $city_town = $_POST['city_town'];
    $post_code = $_POST['post_code'];
    $query = "INSERT INTO checkout_proceed (user_id, name,email, address, customer_phone, city_town, post_code) VALUES ('$user_id', '$name','$customer_email', '$cust_address', '$customer_phone', '$city_town' , '$post_code')";
    $result = mysqli_query($conn, $query);
    // echo $query;
    // exit;
    $check_out_id = mysqli_insert_id($conn);
   if(isset($_POST['items']))
  {
      $items='';
      foreach ($_POST['items']['itm'] as $key=>$roc) {
        if($items == '')
        $items= $roc;
        else
        $items .=','.$roc;
        $qy[$roc] = $_POST['items']['quenty'][$key];
     }
               
  }

  // $sql = '';
// $result0 = '';
$oneitems = explode(',', $items);
// print_r($oneitems);

    if(count($qy) > 1){
      // foreach ($oneitems as $oneitem) {
          $sql = "SELECT * FROM product_description WHERE id IN (".$items.") ";
          // echo "SELECT * FROM product_description WHERE id = ".$oneitem;
      // }

    }
    else{
          $sql = "SELECT * FROM product_description WHERE id = '".$items."' ";
    }     

    // print_r($result0);
          // $result0 = 
// print_r($sql);
        $result0 = mysqli_query($conn, $sql);
        // print_r($result0);
    // if (mysqli_num_rows($result0) > 0) {
  
    while($row = mysqli_fetch_assoc($result0)) {
        $dis = $row['discount'];
        $product_img = $row['product_img'];
        $pri = $row['product_prize'];
        $productid=$row['id'];
        $priz = $pri*$dis;
        $priz=$priz/100;
        $itemq=$qy[$row['id']];
        $prize = $pri-$priz;
        $total+=$prize*$itemq;
        $tq+=$itemq;
        $query = "INSERT INTO checkout_product (chockout_id,product_id, discount,price,quentity) VALUES ('$check_out_id', '$productid', '$dis', '$pri', '$itemq')";
        $result1 = mysqli_query($conn, $query);
       // exit();
// echo "INSERT INTO checkout_product (chockout_id,product_id, discount,price,quentity) VALUES ('$check_out_id', '$productid', '$dis', '$pri', '$itemq')";
       }  
    // }
    $query = "UPDATE checkout_proceed SET grand_total='$total',item_quenty='$tq' WHERE id= '$check_out_id' ";
    $result2 = mysqli_query($conn, $query);
   
         // exit();

    if ($result2) {
      unset($_SESSION['products']);
      // header('location:admin_dashboard.php');
      echo "<script> window.location.href = 'http://localhost/shoaibfyp/shop.php';</script>";
      // exit();
    }else {
      echo "<script> alert('Please Try again'); </script>";
    }        
    exit(); 
  }
?>