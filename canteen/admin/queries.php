<h3 class="text-info text-center">Users Queries</h3>
<table class="table table-bordered mt-5">
    <thead class="thead-dark">

    <?php 
    $get_query="Select * from `contact`";
    $result=mysqli_query($con,$get_query);
    $row_count=mysqli_num_rows($result);
    echo "<tr class='text-center'>
    <th>Sr.no.</th>
    <th>Username</th>
    <th>User email</th>
    <th>Subject</th>
    <th>Message</th>
    <th>Submission Time</th>
    <th>Delete</th>
</tr>
</thead>
<tbody class='text-center'>";

//if the above data fetched is 0 then
if($row_count==0){
    echo "<h2 class='text-danger text-center mt-5'>No query found</h2>";
}else{
    $number=0;
    while($row_data=mysqli_fetch_array($result)){
        $contact_id=$row_data['contact_id'];
        $username=$row_data['name'];
        $email=$row_data['email'];
        $subject=$row_data['subject'];
        $message=$row_data['message'];
        $timestamp=$row_data['timestamp'];

        $number++;
        ?>
        <tr>
        <td><?php echo $number;?></td>
        <td><?php echo $username;?></td>
        <td><?php echo $email;?></td>
        <td><?php echo $subject;?></td>
        <td><?php echo $message;?></td>
        <td><?php echo $timestamp;?></td>
        
        <td><a href="admin_panel.php?delete_query=<?php echo $contact_id?>" type="button" class="text-dark" data-toggle="modal" data-target="#exampleModalLong"><i class="fa-solid fa-trash"></i></a></td> 
        
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
        <button type="button" class="btn btn-light border border-primary" data-dismiss="modal"><a href="./admin_panel.php?queries.php" class="text-decoration-none">No</a></button>
        <button type="button" class="btn btn-primary"><a href='admin_panel.php?delete_query=<?php echo $contact_id?>' class="text-light text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>