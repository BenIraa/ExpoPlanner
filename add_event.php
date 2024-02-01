<?php
session_start();
include_once 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $event_name = $_POST['event_name'];
    $speaker = $_POST['speaker'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $capacity = $_POST['capacity'];

    // Insert new event into the database
    $stmt = $conn->prepare("INSERT INTO EventSchedule (event_name, speaker, time, end_time, capacity) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssi", $event_name, $speaker, $start_time, $end_time, $capacity);

    if ($stmt->execute()) {
        echo "Event added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
