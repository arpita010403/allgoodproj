<?php 
include('../includes/connect.php');
session_start();
if(isset($_GET['order_id'])){
    $order_id=$_GET['order_id'];
    $select_data="Select * from `user_orders` where order_id=$order_id";
    $result=mysqli_query($con,$select_data);
    $row_fetch=mysqli_fetch_assoc($result);
    $invoice_number=$row_fetch['invoice_number'];
    $amount_due=$row_fetch['amount_due'];

    
}
if(isset($_POST['confirm_payment'])){
    $invoice_number = $_POST['invoice_number'];
    $amount=$_POST['amount'];
    $payment_mode=$_POST['payment_mode'];
    $insert_query="Insert into `user_payments` (order_id,invoice_number,amount,payment_mode) values ($order_id,$invoice_number,$amount,'$payment_mode')";
    $result=mysqli_query($con,$insert_query);
    if($result){
        echo "<h3 class='text-center text-light'>Successfully completed the payment</h3>";
        echo "<script>window.open('profile.php?my_orders','_self')</script>";
    }
    $update_orders="update `user_orders` set order_status='Complete' where order_id=$order_id";
    $result_orders=mysqli_query($con,$update_orders);

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment page</title>
    <!-- boostrap css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!--font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!--css link-->
    <link rel="stylesheet" href="../style.css">
    <style>
        body{
            background-color: #43766C;
        }
        
    </style>
</head>
<body>
    
    <div class="container my-5">
    <h1 class="text-center text-light">Confirm Payment</h1>
        <form action="" method="post" >
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="text" class="form-control w-50 m-auto" name="invoice_number" value="<?php echo $invoice_number ?>">
            </div>
            <br>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="" class="text-light">Amount</label>
                <input type="text" class="form-control w-50 m-auto" name="amount" value="<?php echo $amount_due ?>">
            </div>
            <br>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <select name="payment_mode" class="form-select w-50 m-auto">
                    <option>Select Payment Mode</option>
                    <option>UPI</option>
                    <option>Netbanking</option>
                    <option>Paypal</option>
                    <option>Pay Offline</option>
                </select>
            </div>
            <br>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="submit" name="confirm_payment" class="bg-light py-2 px-3 border-0" value="Confirm Payment">
        
        </div>
        </form>
    </div>
</body>
</html>