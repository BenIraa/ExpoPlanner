<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'attendee') {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendee Dashboard</title>
</head>
<body>
    <h2>Welcome, Attendee!</h2>
    <!-- Add content specific to the attendee dashboard -->
</body>
</html>
