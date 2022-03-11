<?php

    include('../includes/conn.php');

// to delete order
    if (isset($_POST['action']) && $_POST['action'] == 'delete_order_id') {

    	$id = $_POST['id'];
		$deleteorder = "DELETE FROM checkout_proceed  WHERE status != 1 AND id = ".$id;
		$deleteorder1 = "DELETE FROM checkout_product  WHERE chockout_id = ".$id;
	    $updateaprove_result = mysqli_query($conn, $deleteorder);
	    $updateaprove_result1 = mysqli_query($conn, $deleteorder1);

	    if ($updateaprove_result && $updateaprove_result1) {
	    	echo "Order Has Been Deleted";
	    }
exit();
    }

// to approve order
    if (isset($_POST['action']) && $_POST['action'] == 'make_approve_order') {

    	$id = $_POST['id'];
		$updateaprove = "UPDATE checkout_proceed SET status = 1 WHERE id = ".$id;

	    $updateaprove_result = mysqli_query($conn, $updateaprove);

	    if ($updateaprove_result) {
	    	echo "Approved";
	    }
exit();
    }


    
    if (isset($_POST['action']) && $_POST['action'] == 'get_data_in_modal' ) {

    	 // echo "fdsfdsfdsfsdfdsf";
    	$id = $_POST['id'];

    	// echo $id;
		$checkout_proceed = "SELECT * FROM checkout_product WHERE chockout_id = ".$id;

		// echo $checkout_proceed;

	    $checkout_proceed_result = mysqli_query($conn, $checkout_proceed);
	    
	    $data = '';

	    // if (mysqli_num_rows($checkout_proceed_result) > 0) {


	    	    while($rows = mysqli_fetch_assoc($checkout_proceed_result)) {

					$checkout_proceed1 = "SELECT * FROM product_description WHERE id = ".$rows['product_id'];

				    $checkout_proceed_result1 = mysqli_query($conn, $checkout_proceed1);
				    $rows1 = mysqli_fetch_assoc($checkout_proceed_result1);

	    	    	$data .= "<tr><td> ".$rows1['product_name']." </td><td>".$rows['quentity']."</td><td>".$rows['discount']."%</td><td>".$rows['price']."</td> </tr>";
	    	    }
	    // }	    

	    echo $data;

	    exit();
    }
