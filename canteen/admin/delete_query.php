<?php
if(isset($_GET['delete_query'])){
    $delete_query=$_GET['delete_query'];
    $delete_contact_query="Delete from `contact` where contact_id=$delete_query";
    $result=mysqli_query($con,$delete_contact_query);
    if($result){
        echo "<script>alert('Query deleted successfully')</script>";
        echo "<script>window.open('./admin_panel.php?queries','_self')</script>";
    }
}
?>