<?php
session_start();
include_once 'db_connection.php';
include_once 'logout.php';

if (!isset($_SESSION['username']) && $_SESSION['role'] !== 'exhibitor') {
    header('Location: login.php');
    exit;
}

// Check if event_id is provided in the URL
if (isset($_GET['id'])) {
    $event_id = $_GET['id'];

    // Delete the event from the database
    $deleteSql = "DELETE FROM eventschedule WHERE id = $event_id AND exhibitor_id = {$_SESSION['exhibitor_id']}";
    if ($conn->query($deleteSql) === TRUE) {
        echo "Event deleted successfully!";
    } else {
        echo "Error deleting event: " . $conn->error;
    }
} else {
    echo "Event ID not provided.";
}
?>
