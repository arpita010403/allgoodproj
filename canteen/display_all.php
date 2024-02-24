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
    <title>Canteen website</title>
    <!-- boostrap css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!--font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!--css link-->
    <link rel="stylesheet" href="style.css">
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

        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <?php
if(isset($_SESSION['username'])){
  echo "<li class='nav-item'>
  <a class='nav-link' href='./users/profile.php'><i class='fa-solid fa-user'></i></a>
</li>";
}else{
  echo "<li class='nav-item'>
          <a class='nav-link' href='./users/user_register.php'>Register</a>
        </li>";

}
?>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item();?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total Price:100/-</a>
        </li> 
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-info" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

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
    <p class="text-center">Good food Good Mood</p>
</div>

<!--fourth child-->
<div class="row px-1">
    <div class="col-md-10">
        <!--products-->
            <div class="row">
    <!-- fetching products -->
            <?php 
            //calling function
             getproducts();
             get_unique_categories();

            ?>
<!-- row end -->
</div>
<!-- col end -->
</div>
 <!--sidenav-->
    <div class="col-md-2 bg-secondary p-0">
       <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-info">
            <a href="#" class="nav-link text-light"><h4>Categories</h4></a>
        </li>
        <?php 
        //calling function
        getcategories();
        ?>
      
      </ul>
    </div>

</div>
    
<!--last child -->
<?php 
include('includes/connect.php');
include('functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Canteen website</title>
    <!-- boostrap css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!--font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!--css link-->
    <link rel="stylesheet" href="style.css">
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
          <a class="nav-link" href="#">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i><sup>1</sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total Price: ₹ <?php total_cart_price();?>/-</a>
        </li>  
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-info" type="submit">Search</button>
      </form>
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
    <li class="nav-item">
          <a class="nav-link" href="#">Welcome Guest</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Login</a>
        </li>
    </ul>
</nav>

<!--third child-->
<div class="bg-light">
    <h3 class="text-center">Online Canteen</h3>
    <p class="text-center">Good Food Good Mood</p>
</div>

<!--fourth child-->
<div class="row px-1">
    <div class="col-md-10">
        <!--products-->
            <div class="row">
    <!-- fetching products -->
            <?php 
            //calling function
             get_all_products();
             get_unique_categories();

            ?>
<!-- row end -->
</div>
<!-- col end -->
</div>
 <!--sidenav-->
    <div class="col-md-2 bg-secondary p-0">
       <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-info">
            <a href="#" class="nav-link text-light"><h4>Categories</h4></a>
        </li>
        <?php 
        //calling function
        getcategories();
        ?>
      
      </ul>
    </div>

</div>
    
<!--last child -->
<!-- include footer -->
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

    </div>

 
<!--boostrap js link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
     crossorigin="anonymous"></script>
</body>
</html>