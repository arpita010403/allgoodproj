<?php 
include('../includes/connect.php');

$A_name=$_POST['username'];
$A_password=$_POST['userpassword'];

$result=mysqli_query($con,"SELECT * FROM `admin` WHERE username='$A_name' AND userpassword='$A_password'");

session_start();


if(mysqli_num_rows($result)){
    $_SESSION['canteen']=$A_name;
    echo "<script>alert('Login successfully');
    window.location.href='admin_panel.php';
    </script>";

}
else{
    echo "<script>alert('invalid username/password');
    window.location.href='ad_login.php';
    </script>";
}


?>