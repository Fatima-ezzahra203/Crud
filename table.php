<?php
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="table.css">
    <!-- Include Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Display data</title>
</head>
<body>
    
    <table class="table" border="3" >
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Password</th>
                <th>Operations</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $sql = "SELECT * FROM users";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    $name = $row['name'];
                    $email = $row['email'];
                    $mobile = $row['mobile'];
                    $password = $row['password'];
                    echo '<tr>  
                        <td>'.$id.'</td>
                        <td>'.$name.'</td>
                        <td>'.$email.'</td>
                        <td>'.$mobile.'</td>
                        <td>'.$password.'</td>
                        <td>
                            <button class="btn-1"><a href="update.php?updateid='.$id.'">Update</a></button>
                            <button class="btn-1"><a href="delete.php?deleteid='.$id.'">Delete</a></button>
                        </td>
                    </tr>';
                }
            }
            ?>
            
        </tbody>
    </table>
    <button class="btn"><a href="adduser.php">Add User</a></button>
    
    
    <button class="btn_log" onclick="location.href='logout.php'"><i class="fas fa-sign-out-alt"></i> Logout</button>

</body>
</html>
