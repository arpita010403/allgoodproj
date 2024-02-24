<?php
if(isset($_GET['delete_feedback'])){
    $delete_query=$_GET['delete_feedback'];
    $delete_feedback_query="Delete from `feedback` where feedback_id=$delete_query";
    $result=mysqli_query($con,$delete_feedback_query);
    if($result){
        echo "<script>alert('Feedback deleted successfully')</script>";
        echo "<script>window.open('./admin_panel.php?feedback','_self')</script>";
    }
}
?>