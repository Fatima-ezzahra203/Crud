<?php
// Start the session (if not started already)
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the login page or any other page after logout
header("Location: login.php"); // Replace 'login.php' with the actual login page URL
exit();
?>
