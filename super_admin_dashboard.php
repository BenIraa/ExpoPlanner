<?php
session_start();
include_once 'db_connection.php';
include_once 'logout.php';



if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Admin Dashboard</title>
</head>
<body>
    <h2>Welcome, Super Admin!</h2>
    <!-- Add content specific to the super admin dashboard -->
    <form method="post">
        <input type="submit" name="logout" value="Logout">
    </form>
</body>
</html>
