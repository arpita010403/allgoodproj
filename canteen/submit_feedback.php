<?php
session_start();
include('./includes/connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $feedback = $_POST['feedback'];
    $ratings = $_POST['ratings']; // Retrieve selected ratings

    // Validate ratings value
    if ($ratings < 1 || $ratings > 5) {
        // Invalid ratings value
        echo "<script>alert('Invalid ratings value. Please select a ratings between 1 and 5.');</script>";
        echo "<script>window.location.href='feedback.php';</script>";
        exit(); // Stop script execution
    }

    // Insert feedback into database
    $insert_feedback_query = "INSERT INTO feedback (name, email, feedback, ratings) VALUES ('$name', '$email', '$feedback', '$ratings')";
    $result = mysqli_query($con, $insert_feedback_query);

    if ($result) {
        // Feedback submitted successfully
        echo "<script>alert('Thank you for your feedback!');</script>";
        echo "<script>window.location.href='index.php';</script>";
    } else {
        // Error occurred while submitting feedback
        echo "<script>alert('Error: Unable to submit feedback. Please try again later.');</script>";
        echo "<script>window.location.href='index.php';</script>";
    }
} else {
    // If the form is not submitted, redirect to the feedback form page
    header("Location: feedback.php");
    exit();
}
?>
