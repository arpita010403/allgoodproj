<?php 
include('../includes/connect.php');
include('../functions/common_function.php');

session_start();
if(!$_SESSION['canteen']){
        header("Location:ad_login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- boostrap css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!--css link-->
    <link rel="stylesheet" href="style.css">

    <style>
        .logo{
            width:6%;
    height: 6%;
        }
        .admin_image{
            width:100px;
            height:100px;
        }
        body{
            overflow-x: hidden;
        }
        .product_img{
            width:60px;
            height: 60px;
            object-fit:contain;
        }
        
    </style>
</head>

<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../images/logo.jpg" alt="" class="logo">
                <nav class="navbar navbar-expand-lg ">
                    <ul class="navbar-nav">
                    <?php
                    if(!isset($_SESSION['canteen'])){
          echo "<li class='nav-item'>
          <a class='nav-link' href='#'>Welcome Guest</a>
        </li>";
        }else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='#'>Welcome " .$_SESSION['canteen']."</a>
        </li>";
        }
    ?>
                    </ul>
                </nav>
            </div>
        </nav>
    <!-- second child -->
    <div class="bg-light">
            <h3 class="text-center p-2">ADMIN DASHBORARD</h3>
        </div>

    <!-- third child -->
    <div class="row">
        <div class="col-md-12 bg-dark p-1 d-flex align-items-center">
            <div class="p-3">
                <a href="#"><img src="../images/profile.jpg" alt="" class="admin_image"></a>
                <p class="text-light text-center">Admin</p>
            </div>
            <div class="button text-center">
                <button class="my-3"><a href="insert_product.php" class="nav-link text-warning bg-light p-2">Insert Item</a></button>
                <button class="my-3" ><a href="admin_panel.php?view_products" class="nav-link text-warning bg-light p-2">View Items</a></button>
                <button class="my-3"><a href="admin_panel.php?insert_category" class="nav-link text-warning bg-light p-2">Insert Category</a></button>
                <button class="my-3"><a href="admin_panel.php?view_categories" class="nav-link text-warning bg-light p-2">View Category</a></button>
                <button class="my-3"><a href="admin_panel.php?list_orders" class="nav-link text-warning bg-light p-2">Orders</a></button>
                <button class="my-3"><a href="admin_panel.php?list_payments" class="nav-link text-warning bg-light p-2">Payments</a></button>
                <button class="my-3"><a href="admin_panel.php?list_users" class="nav-link text-warning bg-light p-2">Users</a></button>
                <button class="my-3"><a href="admin_panel.php?queries" class="nav-link text-warning bg-light p-2">Queries</a></button>
                <button class="my-3"><a href="admin_panel.php?feedback" class="nav-link text-warning bg-light p-2">Feedbacks</a></button>
                <button class="my-3"><a href="ad_login.php" class="nav-link text-warning bg-light p-2">Logout</a></button>
            </div>
        </div>
    </div>

    <!-- fourth child -->
    <div class="container my-3">
        <?php 
        if(isset($_GET['insert_category'])){
            include('insert_categories.php');
        }
        if(isset($_GET['view_products'])){
            include('view_products.php');
        }
        if(isset($_GET['edit_products'])){
            include('edit_products.php');
        }
        if(isset($_GET['delete_product'])){
            include('delete_product.php');
        }
        if(isset($_GET['view_categories'])){
            include('view_categories.php');
        }
        if(isset($_GET['edit_category'])){
            include('edit_category.php');
        }
        if(isset($_GET['delete_category'])){
            include('delete_category.php');
        }
        if(isset($_GET['list_orders'])){
            include('list_orders.php');
        }
        if(isset($_GET['delete_order'])){
            include('delete_order.php');
        }
        if(isset($_GET['list_payments'])){
            include('list_payments.php');
        }
        if(isset($_GET['delete_payment'])){
            include('delete_payment.php');
        }
        if(isset($_GET['list_users'])){
            include('list_users.php');
        }
        if(isset($_GET['delete_user'])){
            include('delete_user.php');
        }
        if(isset($_GET['queries'])){
            include('queries.php');
        }
        if(isset($_GET['delete_query'])){
            include('delete_query.php');
        }
        if(isset($_GET['feedback'])){
            include('feedback.php');
        }
        if(isset($_GET['delete_feedback'])){
            include('delete_feedback.php');
        }
        
        ?>
    </div>

   
            </div>

    <!--boostrap js link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>