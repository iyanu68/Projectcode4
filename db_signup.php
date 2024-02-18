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

$name = mysqli_real_escape_string($conn, $_POST['name']);
$username = mysqli_real_escape_string($conn, $_POST['username']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$registration_time = date('Y-m-d H:i:s'); 


$query = "INSERT INTO project2 (Name, Username, Email, Password, Registration_Time) 
VALUES ('$name', '$username', '$email', '$password', '$registration_time')";
$result = mysqli_query($conn, $query);

if (!$result) {
    echo "Query execution failed: " . mysqli_error($conn);
    mysqli_rollback($conn);
    die();

} else {
    echo '<script> alert("Registration Successful") </script>';
   header ("location:login.php");
    
    
    mysqli_commit($conn);
}

mysqli_close($conn);

?>