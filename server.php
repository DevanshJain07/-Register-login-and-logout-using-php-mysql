<?php
session_start();
$username="";
$email="";
$errors=array();
//connect to the database
$db = mysqli_connect("localhost","root","","authentication") or die($db);
//if the register button is clicked
if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
if(isset($_POST['register_btn'])){
    $username= $_POST['username'];
    $email= $_POST['email'];
    $password= $_POST['password'];
    $password2= $_POST['password2'];
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
    $password=md5($password);//hash password before string for security for security purposes
    $sql="INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
    $res = mysqli_query($db,$sql);
    $_SESSION['username']=$username;
    $_SESSION['success']="You are now logged in";
    header("location:home.php");
    if($res){
        echo "Records inserted successfully.";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}else{
    $_SESSION['success']="The two passwords do not match";
}
}
//log user in from login page
if(isset($_POST['login_btn'])){
    $username= mysqli_real_escape_string($db,$_POST['username']);
    $password= mysqli_real_escape_string($db,$_POST['password']);
if(empty($username)){
    array_push($errors,"Username is required");
}
if(empty($password)){
    array_push($errors,"Password is required");
}
if(count($errors)==0){
    $password=md5($password);//hash password before string for security for security purposes
    $sql="SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result= mysqli_query($db,$sql);
    if(mysqli_num_rows($result)==1){
        $_SESSION['username']=$username;
    $_SESSION['success']="You are now logged in";
    header("location:home.php");
}
else{
    array_push($errors,"wrong username/password combination");
        }
    }   
}
//logout
if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['username']);
    header("location:login.php");
}
?>