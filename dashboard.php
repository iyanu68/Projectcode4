<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
include 'head.php';
?>

<body style="background-color: #8EC5FC; background-image: linear-gradient(62deg, #8EC5FC 0%, #E0C3FC 100%);">
    <h2 style="color:rgb(243, 140, 6); margin-top:1.2em; margin-left:2em; "><strong>Hi, <?php echo $_SESSION['username']; ?>!</strong></h2>
    <a href="logout.php" style="font-size:1em; margin-right:3em; font-family:Times New Roman; float: right;">Logout</a>
    <p style="margin-left:2.5em; font-size:1.7em; font-family:sans; color:#624113; margin-bottom:2em;"><strong>Welcome on board.</p>
    <p style="margin-left:3em; font-size:1.5em; font-family:sans-serif; color:rgb(105, 119, 123); margin-bottom:10em;"> Tell us about your health challenge, and a health expert will be assigned to you.<br> Remember, your health is your wealth.</strong></p>

    <section>
        <h3 style="margin-top:-7em; margin-left:3em; font-family:georgia; font-weight:bold;">Text here:</h3>
        <form id="postForm" method="POST">
            <textarea id="postContent" name="postContent" class="form-control" placeholder="What's your health challenge?" style="margin-left:5em; width:50%; padding-bottom:5em;" required></textarea>

            <input type="hidden" id="edit-mode" value="false" />
            <input type="hidden" id="post-id" name="post_id" value="" />
            <button id="post-btn" class="btn btn-info" style="font-family:georgia; margin-top:1em; margin-left:5em; background:light-blue; color:light-grey;"><b>Post<b></button>
        </form>
    </div>
    <div id="posts-container"></div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="index.js"></script>

    

</body>
</html>