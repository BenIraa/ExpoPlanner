<?php
session_start();

include_once 'db_connection.php';
include_once 'logout.php';

if (!isset($_SESSION['username']) && $_SESSION['role'] !== 'exhibitor') {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exhibitor Dashboard</title>
    <!-- Import the Nunito font from Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;  /* Use Nunito as the primary font */
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
        }

        .container {
            display: flex;
        }

        .content {
            width: 80%;
            padding: 20px;
        }

        h2 {
            color: #333;
        }

        p {
            color: #555;
        }
    </style>
</head>
<body>
    <header>
        <?php 
        echo "<h4>Exhibitor Name: , " . $_SESSION['username'] . "!</h4>";
        echo "<h4>Your User ID: " . $_SESSION['exhibitor_id'] . "</h4>";  
        ?>
    </header>

   

    <div class="container">
        <?php include 'sidebar.php'; ?>

        <div class="content">
            <!-- Content specific to the exhibitor dashboard goes here -->
            <p>This is the exhibitor dashboard content.</p>
        </div>
    </div>
</body>
</html>
