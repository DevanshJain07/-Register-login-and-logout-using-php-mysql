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
    <form method="post" action="register.php">
        <table>
            <tr>
                <td>Username:</td>
                <td><input type="text" name="username" class="textInput"></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="email" name="email" class="textInput"></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="password" class="textInput"></td>
            </tr>
            <tr>
                <td>Confirm Password:</td>
                <td><input type="password" name="password2" class="textInput"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="register_btn" class="Register"></td>
            </tr>
        </table>
        <p>Already a member?<a href="login.php">Sign in</p>
    </form>
    </body>
</html>