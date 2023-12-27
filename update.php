<?php
include 'connection.php';

$id = $_GET['updateid'];

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "UPDATE `users` SET name='$name', email='$email', mobile='$mobile', password='$password' WHERE id=$id";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('location: table.php');
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}


$sql_select = "SELECT * FROM `users` WHERE id=$id";
$result_select = mysqli_query($conn, $sql_select);

if ($result_select) {
    $row = mysqli_fetch_assoc($result_select);
    $existingName = $row['name'];
    $existingEmail = $row['email'];
    $existingMobile = $row['mobile'];
  
} else {
    echo "Error retrieving user data: " . mysqli_error($conn);
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
            <h2>Update User</h2>
            <input type="text" id="name" name="name" required placeholder="Name" value="<?php echo $existingName; ?>">
            <input type="email" id="email" name="email" required placeholder="Email" value="<?php echo $existingEmail; ?>">
            <input type="text" id="mobile" name="mobile" required placeholder="Mobile" value="<?php echo $existingMobile; ?>">
         
            <input type="password" id="password" name="password" required placeholder="Create a password">
            <input type="submit" name="submit" value="Update" class="btn">
        </form>
    </div>
</body>
</html>
