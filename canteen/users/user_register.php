<?php 
include('../includes/connect.php');
include('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registeration</title>
    <!-- boostrap css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!--css link-->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container-fluid">
        <h2 class="text-center">New User Registeration</h2>
        <div class="row d-flex align-items-center justify-content-center" >
            <div class="col-lg-12 col-xl-6">
                <!-- /username feild -->
                <form action=""method="post" enctype="multipart/form-data">
                <div class="form-outline mb-4">    
                <label for="user_username" class="form-label">Username</label>
                <input type="text" name="user_username" id="user_username" class="form-control" placeholder="Enter your username" autocomplete="off" required="required">
                    </div>
                <!-- email field -->
                <div class="form-outline mb-4">
                <label for="user_email" class="form-label">Email</label>
                <input type="email" name="user_email" id="user_email" class="form-control" placeholder="Enter your email" autocomplete="off" required="required">
                </div>
                <!-- image field -->
                <div class="form-outline mb-4">
                <label for="user_image" class="form-label">User Image</label>
                <input type="file" name="user_image" id="user_image" class="form-control" required="required">
                </div>
                <!-- password field -->
                <div class="form-outline mb-4">
                <label for="user_password" class="form-label">Passowrd</label>
                <input type="password" name="user_password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required">
                </div>
                <!-- confirm password field -->
                <div class="form-outline mb-4">
                <label for="user_password" class="form-label">Confirm Passowrd</label>
                <input type="password" name="conf_user_password" id="conf_user_password" class="form-control" placeholder="Reenter your password" autocomplete="off" required="required">
                </div>
                <div class="mt-4 pt-2">
                    <input type="submit" name="user_register" id="" value="Register" class="bg-info py-2 px-3 border-0">
                    <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account ? <a href="user_login.php" class="text-danger">Login</a> </p>
                </div>
                </form>
                
            </div>
        </div>
    </div>
</body>
</html>

<?php 
if(isset($_POST['user_register'])){
    $user_username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
    $conf_user_password=$_POST['conf_user_password'];
    $user_image=$_FILES['user_image']['name'];
    $user_image_tmp=$_FILES['user_image']['tmp_name'];
    $user_ip=getIPAddress();
    

    //select query
    $select_query="Select * from `user_table` where username='$user_username' or user_email='$user_email'";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);
    if($rows_count>0){
        echo "<script>alert('Username and email already exist')</script>";
    
    }else if($user_password!=$conf_user_password){
    echo "<script>alert('password dont match')</script>";
    }

else{ 
    //insert query 
    move_uploaded_file( $user_image_tmp,"./user_images/$user_image");
    $insert_query="insert into `user_table` (username,user_email,password,user_image,user_ip) values ('$user_username','$user_email','$hash_password','$user_image','$user_ip')";
    $sql_execute=mysqli_query($con,$insert_query);
    
    }
    //selecting cart items
    $select_cart_items="Select * from `cart_details` where ip_address='$user_ip'";
    $result_cart=mysqli_query($con,$select_cart_items);
    $rows_count=mysqli_num_rows($result_cart);
    if($rows_count>0){
        $_SESSION['username']=$user_username;
        echo "<script>alert('You have items in your cart')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";

    }else{
        echo "<script>window.open('../index.php','_self')</script>";

    }



} 
?>