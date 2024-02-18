

<?php
include 'head.php';

?>
<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php"); // Redirect logged-in users to the dashboard
    exit();
}
?>



<body style = "background-color: #8EC5FC; 
background-image: linear-gradient(62deg, #8EC5FC 0%, #E0C3FC 100%);">

<br><h3 style= "margin-left:5em; margin-top:2em;"><strong>Log in Page</strong></h3><br>

<?php
    if (isset($_SESSION['login_error'])) {
        echo '<p>' . $_SESSION['login_error'] . '</p>';
        unset($_SESSION['login_error']);
    }
    ?>


<div class="container">
    <div class="col-md-5">
            
        <form action="db_login.php" method="POST">

        <div class="form-group">
            <label for="email" style = "font-family:Times New Roman; color:rgb(243, 140, 6); font-size:16px; font-weight:bold;">Username *</label>
               <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required><i class="fa-solid fa-envelope"></i>
                </div>

          <div class="form-group">
              <label style ="font-family:Times New Roman; color:rgb(243, 140, 6); font-size:16px; font-weight:bold;">Password *</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required><i class="fa-solid fa-lock"></i>
                </div>
                
           <div class ="col-md-12">
                <button class="btn btn-primary" id = "submit">Login </button> <br>
                  
            </div>
            
        </form>  
        </div>
    </div>


</body>