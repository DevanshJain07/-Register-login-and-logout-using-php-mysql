<?php include('server.php'); 
//if user is notlogged in,they cannot access this page
if(empty($_SESSION['username'])){
    header('location: login.php');
}
?>
<html>
    <head>
     <title>Register, login and logout user php mysql</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="header">
            <h1>Home Page</h1>
        </div>
    <div class="content">
    <?php if (isset($_SESSION['success'])): ?>
        <div class="error success">
            <h3>
                <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
           </h3>
        </div>
        <?php endif ?>

        <?php if (isset($_SESSION["username"])): ?>
            <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
            <p><a href="home.php?logout='1'" style="color:red;">logout</a></p>
        <?php endif ?> 
   </div>
    </body>
</html>