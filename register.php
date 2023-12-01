<?php
require "connection/connection.php";

if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    $duplicate = mysqli_query($conn, "select * from register where email='$email'");
    if(mysqli_num_rows($duplicate)>0){
        echo
        "<script> alert('Email Already Taken'); </script>";
    }
    else{
        if($password == $confirmpassword){
            $query = "insert into register values('','$name','$email','$phone','$password')";
            mysqli_query($conn,$query);
            echo
            "<script> alert('Registration Successful'); </script>";
        }
        else{
            echo
            "<script> alert('password does not match'); </script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
</head>
<body>
    <form action="" method="POST" autocomplete="off">
        <label>Full Name</label>
        <input type="text" name="name" id="name" placeholder="Enter your name" required>
        <br>
        <br>
        <br>
        <label>Email</label>
        <input type="text" name="email" id="email" placeholder="Enter your email" required>
        <br>
        <br>
        <br>
        <label>Phone Number</label>
        <input type="text" name="phone" id="phone" placeholder="Enter your phone number" required>
        <br>
        <br>
        <br>
        <label>Password</label>
        <input type="password" name="password" id="password" placeholder="Enter your password" required>
        <br>
        <br>
        <br>
        <label>Confirm Password</label>
        <input type="password" name="confirmpassword" id="confirmpassword" placeholder="Enter your Confirm password" required>
        <br>
        <br>
        <br>
        <button type="submit" name="submit">Register</button>
    </form>
    <br>
    <a href="login.php">Login</a>
</body>
</html>