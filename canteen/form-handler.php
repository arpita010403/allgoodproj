<?php
include('./includes/connect.php');

// Check if the form is submitted
if(isset($_POST['submit'])){
    

    // Retrieve form data
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $subject = mysqli_real_escape_string($con, $_POST['subject']);
    $message = mysqli_real_escape_string($con, $_POST['message']);

    // SQL INSERT statement
    $sql = "INSERT INTO contact (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";

    // Execute SQL statement
    if(mysqli_query($con, $sql)){
        // If data is inserted successfully, you can redirect the user to a thank you page or display a success message
        echo "<script>alert('Form submitted succesfully, Thank you ')</script>";
        echo "<script>window.open('index.php','_self')</script>";
        exit(); // Exit to prevent further execution
    } else {
        // If an error occurs, you can redirect the user back to the form page or display an error message
        header("Location: contact.php?error=database_error");
        exit(); // Exit to prevent further execution
    }
} else {
    // If the form is not submitted, redirect the user back to the form page
    header("Location:contact.php");
    exit(); // Exit to prevent further execution
}
?> 