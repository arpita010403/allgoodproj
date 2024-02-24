<?php 
include('../includes/connect.php');
include('../functions/common_function.php');
  
?> 
<!DOCTYPE html>
<html lang="en">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin login</title>
    <!-- boostrap css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!--css link-->
    <link rel="stylesheet" href="style.css">
<style>
    body {
  font-family: sans-serif;
}

</style>
<body class="bg-secondary">
    <div class="container">
        <h2 class="text-center"> Admin Login</h2>
        <div class="row d-flex align-items-center justify-content-center mt-5" >
            <div class="col-lg-12 col-xl-6">
                <!-- /username feild -->
                <form method="POST" action="login1.php">
                <div class="form-outline mb-4">    
                <label class="form-label">username</label>
                <input type="text" name="username" class="form-control" placeholder="Enter username" autocomplete="off" required="required">
                    </div>

                <!-- password field -->
                <div class="form-outline mb-4">
                <label class="form-label">Passoword</label>
                <input type="password" name="userpassword" class="form-control" placeholder="Enter password" autocomplete="off" required="required">
                </div>
                
               <button class="bg-danger fs4 fw-bold my-3">Login</button>
                </form>
                
            </div>
        </div>
    </div>
</body>
</html>
