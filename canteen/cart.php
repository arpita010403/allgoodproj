<?php 
include('./includes/connect.php');
include('./functions/common_function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Canteen website-Cart details</title>
    <!-- boostrap css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!--font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!--css link-->
    <link rel="stylesheet" href="style.css">
    <style>
        .cart_img{
    width:100px;
    height: 100px;
    display: block;
  margin-left: auto;
  margin-right: auto;
  object-fit:contain;
  
}

    </style>
  </head>
<body>
    <!--navbar-->
    <div class="container-fluid p-0">
        <!---first child-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <img src="./images/logo.jpg" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Menu</a>
        </li>
        <?php
if(isset($_SESSION['username'])){
  echo "<li class='nav-item'>
  <a class='nav-link' href='./users/profile.php'>My Account</a>
</li>";
}else{
  echo "<li class='nav-item'>
          <a class='nav-link' href='./users/user_register.php'>Register</a>
        </li>";

}
?>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item();?></sup></a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- calling cart function -->
<?php
cart();
?>

<!--second child-->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <ul class="navbar-nav me-auto">
    
        <?php 
        if(!isset($_SESSION['username'])){
          echo "<li class='nav-item'>
          <a class='nav-link' href='#'>Welcome Guest</a>
        </li>";
        }else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='#'>Welcome " .$_SESSION['username']."</a>
        </li>";
        }
if(!isset($_SESSION['username'])){
  echo "<li class='nav-item'>
  <a class='nav-link' href='./users/user_login.php'>Login</a>
</li>";
}else{
  echo "<li class='nav-item'>
  <a class='nav-link' href='./users/logout.php'>Logout</a>
</li>";
}

?>
    </ul>
</nav>

<!--third child-->
<div class="bg-light">
    <h3 class="text-center">Online Canteen</h3>
    <p class="text-center">Good Food Good Mood</p>
</div>

<!-- fourth child-table -->
<div class="container">
    <div class="row">
      <form action="" method="post">
        <table class="table table-bordered text-centered">

            <!-- php code to display dynamic data -->
            <?php
              $get_ip_add = getIPAddress();//to know which item is purchased we access the ip address
              $total_price=0;
              $cart_query="Select * from cart_details where ip_address='$get_ip_add'";
              $result=mysqli_query($con,$cart_query);
              $result_count=mysqli_num_rows($result);
              if($result_count>0){
                echo "<thead>
                <tr>
                    <th>Product Title</th>
                    <th>Product Image</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Customization</th>
                    <th>Remove</th>
                    <th colspan='2'>Operations</th>
                </tr>
            </thead>
            <tbody>";

              
              while($row=mysqli_fetch_array($result)){
                $product_id=$row['product_id'];
                $select_products="Select * from products where product_id='$product_id'";
                $result_products=mysqli_query($con,$select_products);
                while($row_product_price=mysqli_fetch_array($result_products)){
                  $product_price=array($row_product_price['product_price']);
                  $price_table=$row_product_price['product_price'];
                  $product_title=$row_product_price['product_title'];
                  $product_image=$row_product_price['product_image'];
                  $product_values=array_sum($product_price);
                  $total_price+=$product_values;
              
            ?>
            
            
                <tr>
                    <td><?php echo $product_title?></td>
                    <!-- here the path mention will access the images store in db  -->
                    <td><img src="./admin/product_images/<?php echo $product_image?>" alt="" class="cart_img center"></td>
                    <td><input type="text" name="qty" class="form-input w-50"></td>
                    <?php 
                    $get_ip_add = getIPAddress();
                    if(isset($_POST['update_cart'])){
                      $quantities=$_POST['qty'];
                      $update_cart="update `cart_details` set quantity=$quantities where ip_address='$get_ip_add'";
                      $result_products_quantity=mysqli_query($con,$update_cart);
                      $total_price=$total_price*$quantities;
                    }
                    ?>
                    <td>₹ <?php echo $price_table?>/-</td>
                    <td>
    <input type="text" name="customization[<?php echo $product_id; ?>]" class="form-input w-50" placeholder="Enter customization">
</td>

                    <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
                    <td>
                      
                        <!-- <button class="bg-info px-3 py-2 border-0 mx-3">Update</button> -->
                        <input type="submit" value="Update Cart" class="btn bg-info px-3 py-2 border-1 mx-2" name="update_cart">
                        <?php
                        // Check if the update cart form is submitted
if(isset($_POST['update_cart'])){
  // Loop through each product in the cart
  foreach($_POST['customization'] as $product_id => $customization){
      // Prepare the customization description for database insertion
      $customization_description = mysqli_real_escape_string($con, $customization);
      
      // Update the cart table to store the customization description
      $update_cart_query = "UPDATE cart_details SET customization_description = '$customization_description' WHERE product_id = '$product_id' AND ip_address = '$get_ip_add'";
      mysqli_query($con, $update_cart_query);
  }

  
}
                        ?>
                        <!-- <button class="bg-info px-3 py-2 border-0 mx-3">Remove</button> -->
                        <input type="submit" value="Remove" class="btn bg-info px-3 py-2 border-1 mx-2" name="remove_cart">
                    </td>
                </tr>
                <?php }}}
                else{
                  echo "<h2 class='text-center text-danger'>Oops...Your cart is empty!</h2>";
                  
                }
                
                ?>
            </tbody>
        </table>
        <!-- subtotal -->
        <div class="d-flex mb-5">
        <?php
              $get_ip_add = getIPAddress();//to know which item is purchased we access the ip address  
              $cart_query="Select * from cart_details where ip_address='$get_ip_add'";
              $result=mysqli_query($con,$cart_query);
              $result_count=mysqli_num_rows($result);
              if($result_count>0){
                echo "<h4 class='px-3'>Subtotal:<strong class='text-info'>₹ $total_price /-</strong></h4>
                <input type='submit' value='Continue Ordering' class='btn bg-info px-3 py-2 border-1 mx-2' name='continue_ordering'>
                <button class='bg-secondary px-3 py-2 border-0' name='checkout'><a href='./users/checkout.php' class='text-light'>Checkout</a></button>";
              }
              else{
                echo "<input type='submit' value='Continue Ordering' class='btn bg-info px-3 py-2 border-1 mx-2' name='continue_ordering'>";
              }
              if(isset($_POST['continue_ordering'])){
                echo "<script>window.open('index.php','_self')</script>";
              }

              ?>
            
        </div>
    </div>
</div>
</form>

<!-- function to remove item -->


<?php 
function remove_cart_item(){
  global $con;
  if(isset($_POST['remove_cart'])){
    foreach($_POST['removeitem'] as $remove_id){
      echo $remove_id;
      $delete_query="Delete from `cart_details` where product_id=$remove_id";
      $run_delete=mysqli_query($con,$delete_query);
      if($run_delete){
        echo "<script>window.open('cart.php','_self')</script>";
      }
    }
  }
}
echo $remove_item=remove_cart_item();
?>
 <!--last child footer-->
<?php 
include('./includes/footer.php');
?>
    </div>
<!--boostrap js link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
     crossorigin="anonymous"></script>
</body>
</html>