<h3 class="text-info text-center">All Payments</h3>
<table class="table table-bordered mt-5">
    <thead class="thead-dark">

    <?php 
    $get_payments="Select * from `user_payments`";
    $result=mysqli_query($con,$get_payments);
    $row_count=mysqli_num_rows($result);
    echo "<tr class='text-center'>
    <th>Sr.no.</th>
    <th>Invoice Number</th>
    <th>Amount</th>
    <th>Payment Mode</th>
    <th>Order Date</th>
    <th>Delete</th>
</tr>
</thead>
<tbody class='text-center'>";

//if the above data fetched is 0 then
if($row_count==0){
    echo "<h2 class='text-danger text-center mt-5'>No payment received</h2>";
}else{
    $number=0;
    while($row_data=mysqli_fetch_array($result)){
        $order_id=$row_data['order_id'];
        $payment_id=$row_data['payment_id'];
        $invoice_number=$row_data['invoice_number'];
        $amount=$row_data['amount'];
        $payment_mode=$row_data['payment_mode'];
        $date=$row_data['date'];
        $number++;
        ?>
        <tr>
        <td><?php echo $number;?></td>
        <td><?php echo $invoice_number;?></td>
        <td>₹<?php echo $amount;?>/-</td>
        <td><?php echo $payment_mode;?></td>
        <td><?php echo $date;?></td>
       
        
        <td><a href="admin_panel.php?delete_payment=<?php echo $payment_id?>" type="button" class="text-dark" data-toggle="modal" data-target="#exampleModalLong"><i class="fa-solid fa-trash"></i></a></td> 
        
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
        <button type="button" class="btn btn-light border border-primary" data-dismiss="modal"><a href="./admin_panel.php?list_payments" class="text-decoration-none">No</a></button>
        <button type="button" class="btn btn-primary"><a href='admin_panel.php?delete_payment=<?php echo $payment_id?>' class="text-light text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>