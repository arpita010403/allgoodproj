<?php
include('../includes/connect.php');
include('../functions/common_function.php');

// Fetch user details based on IP address
$user_ip = getIPAddress();
$get_user = "SELECT * FROM user_table WHERE user_ip='$user_ip'";
$user_result = mysqli_query($con, $get_user);
$user_details = mysqli_fetch_assoc($user_result);

// Fetch user details based on session username
$user_id = null;
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $get_user = "SELECT * FROM `user_table` WHERE username='$username'";
    $result = mysqli_query($con, $get_user);
    $row_fetch = mysqli_fetch_array($result);
    if($row_fetch) {
        $user_id = $row_fetch['user_id'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <!-- Bootstrap CSS link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- CSS link -->
    <link rel="stylesheet" href="style.css">
</head>
<style>
   
</style>
<body class="align-items-center my-5">

    <h2>Order details</h2>
    <div class="align-items-center my-5 border rounded p-4">
        <div>
            <!-- Display user details -->
            <h3>User Details</h3>
            <?php if($user_details): ?>
                <p>User ID: <?php echo $user_details['user_id']; ?></p>
                <p>User Name: <?php echo $user_details['username']; ?></p>
                <p>User Email: <?php echo $user_details['user_email']; ?></p>
            <?php else: ?>
                <p>No user details found.</p>
            <?php endif; ?>
        </div>
        <div>
            <div>
                <?php if($user_id): ?>
                    <a href="order.php?user_id=<?php echo $user_id ?>" target="_blank"><h2 class="text-center">Place order</h2></a>
                <?php else: ?>
                    <p>User not logged in.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>
