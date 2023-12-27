<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get values from the form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM admin WHERE email=? AND password=?");

    // Check for errors in the prepare statement
    if (!$stmt) {
        die("Error in prepare statement: " . $conn->error);
    }

    $stmt->bind_param("ss", $email, $password);

    // Execute the query
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Check if the query was successful
    if ($result->num_rows > 0) {
        // User is authenticated, you can redirect to a success page or set a session variable
        header('location: table.php');
    } else {
        // Invalid credentials, you can display an error message
        echo "Invalid email or password!";
    }

    // Close the statement
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleslog.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <h2>Login</h2>
            <input type="email" id="email" name="email" required placeholder="Email">
            <input type="password" id="password" name="password" required placeholder="Password">
            <input type="submit" name="submit" value="Login" class="btn">
            <p>Don't have an account? Create one <span><a href="register.php">Register now</a></span></p>
        </form>
    </div>
</body>
</html>
