<?php 
include('../includes/connect.php');
include('../functions/common_function.php');
@session_start();//if this page is active then only session will be started  
?>
<?php 
if(isset($_POST['user_login'])){
    $user_username=$_POST['user_username'];
    $user_password=$_POST['user_password'];
   //checked users counted rows
    $select_query="Select * from `user_table` where username='$user_username'";//checking user with that username is present or not
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    $user_ip=getIPAddress();
    
    //cart item
    $select_query_cart="Select * from `cart_details` where ip_address='$user_ip'";//checking user with that username is present or not
    $select_cart=mysqli_query($con,$select_query_cart);
    $row_count_cart=mysqli_num_rows($select_cart);
    
    //it will selct only onr row data
    if ($row_count > 0) {
        if (password_verify($user_password, $row_data['password'])) { // Adjusted to use 'password' key
            $_SESSION['username'] = $user_username;
            echo "<script>alert('Login successful')</script>";
            echo "<script>window.open('../index.php','_self')</script>";
        } else {
            echo "<script>alert('Invalid credentials')</script>";
        }
    } else {
        echo "<script>alert('User not found')</script>";
    }
}    
?>  
<!DOCTYPE html>
<html lang="en">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User login</title>
    <!-- boostrap css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    
<style>
    body {
  font-family: sans-serif;
}

</style>
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
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../display_all.php">Menu</a>
        </li>

        
        <li class="nav-item">
          <a class="nav-link" href="../contact.php">Contact</a>
        </li>
        <?php
if(isset($_SESSION['username'])){
  echo "<li class='nav-item'>
  <a class='nav-link' href='profile.php'><i class='fa-solid fa-user'></i></a>
</li>";
}else{
  echo "<li class='nav-item'>
          <a class='nav-link' href='user_register.php'>Register</a>
        </li>";

}
?>
        <li class="nav-item">
          <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item();?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total Price: ₹ <?php total_cart_price();?>/-</a>
        </li> 
      </ul>
      <form class="d-flex" action="search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <input type="submit" value="Search" class="btn btn-outline-info" name="search_data_product">
      </form>
    </div>
  </div>
</nav>

<!-- calling cart function -->
<?php
cart();
?>
    <div class="container-fluid">
        <h2 class="text-center"> User Login</h2>
        <div class="row d-flex align-items-center justify-content-center mt-5" >
            <div class="col-lg-12 col-xl-6">
                <!-- /username feild -->
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
                <div class="form-outline mb-4">    
                <label for="user_username" class="form-label">Username</label>
                <input type="text" name="user_username" id="user_username" class="form-control" placeholder="Enter your username" autocomplete="off" required="required">
                    </div>

                <!-- password field -->
                <div class="form-outline mb-4">
                <label for="user_password" class="form-label">Passowrd</label>
                <input type="password" name="user_password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required">
                </div>
                
                <div class="mt-4 pt-2">
                    <input type="submit" name="user_login" id="" value="Login" class="bg-info py-2 px-3 border-0">
                    <p class="small fw-bold mt-2 pt-1 mb-0">Don"t have an account? <a href="user_register.php" class="text-danger">Register</a> </p>
                </div>
                </form>
                
            </div>
        </div>
    </div>
</body>
</html>
