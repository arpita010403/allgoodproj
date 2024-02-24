<?php
if(isset($_GET['delete_order'])){
    $delete_order=$_GET['delete_order'];
    $delete_query="Delete from `user_orders` where order_id=$delete_order";
    $result=mysqli_query($con,$delete_query);
    if($result){
        echo "<script>alert('Order is been deleted successfully')</script>";
        echo "<script>window.open('./admin_panel.php?list_orders','_self')</script>";
    }
}
?>