<h3 class="text-success text-center">All Orders</h3>
<table class="table table-bordered mt-5">
    <thead>

    <?php 
    $get_orders="Select * from `user_orders`";
    $result=mysqli_query($con,$get_orders);
    $row_count=mysqli_num_rows($result);
    echo "<tr class='bg-secondary text-light text-center'>
    <th>Sr.no.</th>
    <th>Due Amount</th>
    <th>Invoice Number</th>
    <th>Total Items</th>
    <th>Order Date</th>
    <th>Status</th>
    <th>Delete</th>
</tr>
</thead>
<tbody class='text-center'>";

//if the above data fetched is 0 then
if($row_count==0){
    echo "<h2 class='text-danger text-center mt-5'>No orders yet!</h2>";
}else{
    $number=0;
    while($row_data=mysqli_fetch_array($result)){
        $order_id=$row_data['order_id'];
        $user_id=$row_data['user_id'];
        $amount_due=$row_data['amount_due'];
        $invoice_number=$row_data['invoice_number'];
        $total_products=$row_data['total_products'];
        $order_date=$row_data['order_date'];
        $order_status=$row_data['order_status'];
        $number++;
        ?>
        <tr>
        <td><?php echo $number;?></td>
        <td><?php echo $amount_due;?></td>
        <td><?php echo $invoice_number;?></td>
        <td><?php echo $total_products;?></td>
        <td><?php echo $order_date;?></td>
        <td><?php echo $order_status;?></td>
        
        <td><a href="admin_panel.php?delete_order=<?php echo $order_id?>" type="button" class="text-dark" data-toggle="modal" data-target="#exampleModalLong"><i class="fa-solid fa-trash"></i></a></td> 
        
    </tr>
 <?php   
    }
}
?>
   
        
    </tbody>
</table>
<!-- Modal/popup confirmation -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
        <h4>Are you sure you want to delete this?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light border border-primary" data-dismiss="modal"><a href="./admin_panel.php?list_orders" class="text-decoration-none">No</a></button>
        <button type="button" class="btn btn-primary"><a href='admin_panel.php?delete_order=<?php echo $order_id?>' class="text-light text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>