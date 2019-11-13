<?php
session_start();
$username="";
$email="";
$errors=array();
//connect to the database
$db = mysqli_connect('localhost','root','','registration');
//if the register button is clicked
if(isset($_POST['register_btn'])){
    $username= mysql_real_escape_string($_POST['username']);
    $email= mysql_real_escape_string($_POST['email']);
    $password= mysql_real_escape_string($_POST['password']);
    $password2= mysql_real_escape_string($_POST['password2']);
if(empty($username)){
    array_push($errors,"Username is required");
}
if(empty($email)){
    array_push($errors,"Email is required");
}
if(empty($password)){
    array_push($errors,"Password is required");
}
if($password!=$password2){
    array_push($errors,"The two passwords do not match");
}
if(count($errors) == 0){
    $password=md5($password);//hash password before stroing for security for security purposes
    $sql="INSERT INTO users (username, email, password) VALUES('$username', '$email', '$password')";
    mysqli_query($db,$sql);
    $_SESSION['username']=$username;
    $_SESSION['success']="You are now logged in";
    header('location:home.php');
}
}
//log user in from login page
if(isset($_POST['login'])){
    $username= mysql_real_escape_string($_POST['username']);
    $password= mysql_real_escape_string($_POST['password']);
if(empty($username)){
    array_push($errors,"Username is required");
}
if(empty($password)){
    array_push($errors,"Password is required");
}
if(count($errors)==0){
    $password=md5($password);//hash password before stroing for security for security purposes
    $query="SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result= mysqli_query($db,$sql);
    if(mysqli_num_rows($result)==1){
        $_SESSION['username']=$username;
    $_SESSION['success']="You are now logged in";
    header('location:home.php');
}else{
    array_push($errors,"wrong username/password combination");
        }
    }
}
//logout
if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['username']);
    header('location:login.php');
}
?>