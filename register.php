<?php
include 'connection.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    // Check if passwords match
    if ($password !== $cpassword) {
        echo "Error: Passwords do not match.";
    } else {
        // Passwords match, proceed with the registration
        $sql = "INSERT INTO `admin` (full_name, email, password) VALUES ('$username', '$email', '$password')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            header('location: login.php');
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesreg.css">
    <title>Registration</title>
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <h2>Registration</h2>
            <input type="text" id="username" name="username" required placeholder="Username">
            <input type="email" id="email" name="email" required placeholder="Email">
            <input type="password" id="password" name="password" required placeholder="Create a password">
            <input type="password" id="cpassword" name="cpassword" required placeholder="Confirm password">
            <input type="submit" name="submit" value="Sign Up" class="btn">
            <p>Already have an account? <span><a href="login.php">Login now</a></span></p>
        </form>
    </div>
</body>
</html>
