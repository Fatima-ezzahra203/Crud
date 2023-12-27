<?php
include 'connection.php';

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    // Use prepared statement to prevent SQL injection
    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            header('location: table.php');
        } else {
            die(mysqli_error($conn));
        }

        mysqli_stmt_close($stmt);
    } else {
        die(mysqli_error($conn));
    }
}
?>
