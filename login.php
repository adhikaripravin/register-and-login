<?php
require "connection/connection.php";

if(isset($_POST["submit"])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $result = mysqli_query($conn, "select * from register where email = '$email' and password = '$password'");
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result)>0){
        if($password == $row['password']){
            $_SESSION['login'] =true;
            $_SESSION['id'] = $row['id'];
            header("location: home.php");
        }
        else{
            "<script> alert ('wrong password'); </script>";
        }
    }
    else{
        echo
        "<script> alert ('user not registered'); </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
    <form action="" method="POST" autocomplete="off">
        <label>Email</label>
        <input type="text" name="email" id="email" placeholder="Enter your email" required>
        <br>
        <br>
        <br>
        <label>Password</label>
        <input type="password" name="password" id="password" placeholder="Enter your password" required>
        <br>
        <br>
        <br>
        <button type="submit" name="submit">Login</button>
    </form>
    <br>
    <a href="register.php">Registration</a>
</body>
</html>