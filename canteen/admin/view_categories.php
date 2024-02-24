<h3 class="text-center text-success">All Categories</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-secondary">
        <tr class="text-center">
            <th>Sr no.</th>
            <th>Category Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $select_cat="Select *from `categories`";
        $result=mysqli_query($con,$select_cat);
        $number=0;
        while($row=mysqli_fetch_array($result)){
            $category_id=$row['category_id'];
            $category_title=$row['category_title'];
            $number++;
        
        ?>
        <tr class="text-center">
            <th><?php echo $number;?></th>
            <th><?php echo $category_title;?></th>
            <td><a href='admin_panel.php?edit_category=<?php echo $category_id?>' class='text-dark'><i class='fa-solid fa-pen-to-square'></i></a></td>
            <td><a href='admin_panel.php?delete_category=<?php echo $category_id?>' type="button" class="text-dark" data-toggle="modal" data-target="#exampleModalLong"><i class='fa-solid fa-trash'></i></a></td> 
                
        </tr>
        <?php
        }?>
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
        <button type="button" class="btn btn-light border border-primary" data-dismiss="modal"><a href="./admin_panel.php?view_category" class="text-decoration-none">No</a></button>
        <button type="button" class="btn btn-primary"><a href='admin_panel.php?delete_category=<?php echo $category_id?>' class="text-light text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>