
<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle login form submission

$host = "localhost";
$username = "store_admin";
$password = "password1#";
$database = "projectoutro";

$conn = mysqli_connect($host, $username, $password, $database);


if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die();
}

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    
    $query = "SELECT * FROM project2 WHERE Username = '$username' AND Password = '$password'";
    $result = mysqli_query($conn, $query);
    
    if ($result && mysqli_num_rows($result) > 0) {
        // Successfully fetched user data
        $user = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['Username'];
        header("Location: dashboard.php");
        exit();
    } else {
        // Invalid username or password
        echo "Invalid username or password";
        header("Location: login.php");
        exit();
    }
    
    
    mysqli_close($conn);

}
    ?>
    