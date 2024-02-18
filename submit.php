<?php

$host = "localhost";
$username = "store_admin";
$password = "password1#";
$database = "projectoutro";

$conn = mysqli_connect($host, $username, $password, $database);

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die();
}

$postContent = $conn->real_escape_string($_POST['postContent']);
$edit_mode = $_POST['edit_mode'] === 'true';
$post_id = $conn->real_escape_string($_POST['post_id']);

if ($edit_mode) {
    $sql = "UPDATE post SET `postContent` = '" . $postContent . "' WHERE `post_id` = '" . $post_id . "'";
} else {
    // Insert data into the database for a new post
    $sql = "INSERT INTO post (`postContent`) VALUES ('" . $postContent . "')";
}

if ($conn->query($sql) === TRUE) {
    // If insertion/update is successful, you can return a success message if needed
    echo "Post added/updated successfully!";
} else {
    // If there's an error, you can return an error message
    echo "Error adding/updating post: " . $conn->error;
}
?>