<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Your database connection code (modify the credentials accordingly)
    $host = "localhost";
    $username = "store_admin";
    $password = "password1#";
    $database = "projectoutro";

    $conn = mysqli_connect($host, $username, $password, $database);

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        die();
    }

    // Get the post content from the AJAX request
    $postContent = mysqli_real_escape_string($conn, $_POST['postContent']);

    // Get the user ID from the session
    $user_id = $_SESSION['user_id'];

    // Insert the post into the database
    $query = "INSERT INTO post (user_id, postContent) VALUES ('$user_id', '$postContent')";
    $result = mysqli_query($conn, $query);

    if ($result === TRUE) {
        echo "Post submitted successfully!";
    } else {
        echo "Error submitting post: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    // If the request method is not POST, handle accordingly (optional)
    echo "Invalid request method.";
}
?>