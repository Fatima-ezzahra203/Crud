<?php
include 'connection.php';
if(isset($_POST['submit'])){  
    $name=$_POST['name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $password=$_POST['password'];
    $sql="INSERT INTO `users` (name, email, mobile, password) VALUES ('$name', '$email', '$mobile', '$password')";
    $result=mysqli_query($conn,$sql);
    if($result){
        header('location: table.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="adduser.css">
    <title>Crud</title>
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <h2>Add User</h2>
            <input type="text" id="name" name="name" required placeholder="Name">
            <input type="email" id="email" name="email" required placeholder="Email">
            <input type="text" id="mobile" name="mobile" required placeholder="Mobile"> 
            <input type="password" id="password" name="password" required placeholder="Create a password">
            <input type="submit" name="submit" value="Submit" class="btn">
        </form>
    </div>
</body>
</html>
