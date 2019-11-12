<?php include('server.php'); ?>

<html>
    <head>
        <title>Register, login and logout user php mysql</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="header">
            <h1>Register, login and logout user php mysql</h1>
        </div>
    <form method="post" action="login.php">
    <?php include('errors.php');?>

        <table>
            <tr>
                <td>Username:</td>
                <td><input type="text" name="username" class="textInput"></td>
            </tr>
            
            <tr>
                <td>Password:</td>
                <td><input type="password" name="password" class="textInput"></td>
            </tr>
            
                <td></td>
                <td><input type="submit" name="login_btn" class="login"></td>
            </tr>
        </table>
        <p>Not yet a member?<a href="register.php">Sign up</p>
    </form>
    </body>
</html>