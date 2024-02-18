
<?php
include 'head.php';

?>

<body style =  "background-color: #8EC5FC; 
background-image: linear-gradient(62deg, #8EC5FC 0%, #E0C3FC 100%);">

<div class="container">
    <br><h3 style="font-size:35px;"><i class="fa-regular fa-user"></i>&nbsp; <strong>Register Here</strong></h3><br>
    <div class = "row">
        <div class = "col-md-8">
           
        <form action="db_signup.php" method="POST">
            <div class = "form-group">
                <label style = "font-family:Times New Roman; color:rgb(243, 140, 6); font-size:15px; font-weight:bold;"> Name *</label>
                    <input type="text" class="form-control" id="name"  placeholder = "Enter your name" name = "name" required>
            </div>

            <div class = "form-group">
                <label style ="font-family:Times New Roman; color:rgb(243, 140, 6); font-size:15px; font-weight:bold;"> Username *</label>
                    <input type = "text" class = "form-control" id="username" placeholder = "Enter your username" name = "username" required>
            </div>

            <div class="form-group">
                <label for="email" style = "font-family:Times New Roman; color:rgb(243, 140, 6); font-weight:bold; font-size:15px;">E-mail</label>
                    <input type="email" class="form-control" id="e-mail" placeholder="e-mail" name = "email">
            </div>
                    
            <div class = "form-group">
                <label style ="font-family:Times New Roman; color:rgb(243, 140, 6); font-weight:bold; font-size:15px;"> Password* </label>
                    <input type = "password" class = "form-control" id = "password" name = "password" placeholder = "Enter your password" required>
                </div>
                
            <input type="hidden" name="registration_time" value="<?php echo $registration_time; ?>">
           

            
                <button class = "btn btn-lg btn-success" id = "submit" style = "margin-bottom:4em;">&nbsp;SignUp</button>
                
                <p style = "margin-top:-7em; margin-left:10em; font-family:Times New Roman; color:rgb(243, 140, 6); font-weight:bold;">Already have an account? <a href = "#">Login</a></p>
            </div>
        </form>
    </div>
        </div>
</body>