<?php
  include 'header.php';
?>
  <div class="wrapper ">
    <?php include 'sidebar.php'; ?>
    <div class="main-panel">
      <?php include 'navbar.php'; ?>
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All Order's List</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>Sr #</th>
                        <th>Order Id</th>
                        <th>Date & Time</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Total</th>
                        <!-- <th>Quantity</th> -->
                        <th>Address</td>
                        <th>Status</th>
                        <th>Edit</th>
                        <th>Delete</th>
                      </thead>
                      <?php
                        include 'includes/conn.php';
                        $id = 0;
                        $checkout_proceed = "SELECT * FROM checkout_proceed ORDER BY id DESC ";
                        $checkout_proceed_result = mysqli_query($conn, $checkout_proceed);
                        if (mysqli_num_rows($checkout_proceed_result) > 0) {
                        while($row = mysqli_fetch_assoc($checkout_proceed_result)) {
                          $id++;
                            ?>
                            <tr class="row<?php echo $row['id'];?>">
                              <td><label><?php echo $id?></label></td>
                              <td><label><?php echo $row["id"];?></label></td>
                              <td><label><?php echo date('d-M-Y H: A' , strtotime($row["created_at"]));?></label></td>
                              <td><label><?php echo $row["name"];?></label></td>
                              <td><label><?php echo $row["email"];?></label></td>
                              <td><label><?php echo $row["grand_total"];?></label></td><!-- 
                              <td><label><?php echo $row["item_quenty"];?></label></td> -->
                              <td><label><?php echo $row["address"];?></label></td>
                              <!-- <label><?php echo $row["status"];?></label> -->
                              <td class="approvtext<?php echo $row['id']; ?>">
                                 <label style="color: black">
                                 <?php
                                    if (isset($row['status']) && $row['status'] == 1) {
                                    echo 'Approved';
                                  }else{ ?>
                                 <a class="btn btn-success btn-sm" onclick="makeapprove(<?php echo $row['id']; ?>);"> Approve </a></label>
                                 <?php }
                                 ?>

                              </td>
                              <td><label><a href="#" class="btn btn-danger btn-sm" name="edit" data-target='#myModal' onclick="getidinmodal(<?php echo $row['id'];?>)"  >View</a></label></td>

                              <td><label><a href="delet_order.php?id=<?php echo $row['id'];?>" class="btn btn-warning" name="delete">Delete</a></label></td>
                              <!-- <td><label><a class="btn btn-warning btn-sm" onclick="deleteorder(<?php echo $row['id'];?>);" name="delete">Delete</a></label></td> -->
                            </tr>
                            <?php
                            }
                        } else {
                            echo "<tr><th clospan='9'>0 results</th></tr>";
                        }
                        ?>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
<?php
  include 'footer.php';
?>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Order's Detail</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
          <div>
              <table width="100%" border="2px" >
                <thead>
                  <tr>
                    <th>Product Name</th>               
                    <th>Qty </th>              
                    <th>Discount </th> 
                    <th>Price </th>              
                  </tr>             
                </thead>
                  <tbody class="ourorderdata">                
                </tbody>
              </table>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<script type="text/javascript">
  
  function getidinmodal(id) {
    // alert(id);
    $("#myModal").modal('show');
$.ajax({
        url: 'ajax/getdatainmodal.php',
        type: 'POST',  // http method
        data: {id : id ,  action: 'get_data_in_modal' },  // data to submit
        success: function (data) {

          $(".ourorderdata").html(data);

        },
        // error: function (jqXhr, textStatus, errorMessage) {
            // $('p').append('Error: ' + errorMessage);
          // }
      });
  }

function makeapprove(id) {
  
  $.ajax({
        url: 'ajax/getdatainmodal.php',
        type: 'POST',  // http method
        data: {id : id ,  action: 'make_approve_order' },  // data to submit
        success: function (data) {

          $(".approvtext"+id).html(data);

        },
        // error: function (jqXhr, textStatus, errorMessage) {
            // $('p').append('Error: ' + errorMessage); ``
          // }
      });
}

function deleteorder(id) {
  
  $.ajax({
        url: 'ajax/getdatainmodal.php',
        type: 'POST',  // http method
        data: {id : id ,  action: 'delete_order_id' },  // data to submit
        success: function (data) {

          $(".row"+id).remove();
        },
        // error: function (jqXhr, textStatus, errorMessage) {
            // $('p').append('Error: ' + errorMessage);
          // }
      });
}

</script>