<?php
require "connection/connection.php";

if(!empty($_SESSION['id'])){
    $id = $_SESSION['id'];
    $result = mysqli_query($conn, "select * from register where id = $id");
    $row = mysqli_fetch_assoc($result);
}
else{
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome page</title>
</head>
<body>
    <h1> Welcome <?php echo $row['name']; ?> </h1>
    <a href="login.php">Logout</a>
</body>
</html>