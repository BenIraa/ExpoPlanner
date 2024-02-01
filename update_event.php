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

    // Fetch event details based on event_id
    $sql = "SELECT * FROM eventschedule WHERE id = $event_id AND exhibitor_id = {$_SESSION['exhibitor_id']}";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $eventData = $result->fetch_assoc();
    } else {
        $eventData = null;
    }

    // Handle the update form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get updated data from the form
        $updatedTitle = $_POST['title'];
        $updatedDescription = $_POST['description'];
        // ... other fields ...

        // Update the event in the database
        $updateSql = "UPDATE eventschedule SET title = '$updatedTitle', description = '$updatedDescription' WHERE id = $event_id";
        if ($conn->query($updateSql) === TRUE) {
            echo "Event updated successfully!";
        } else {
            echo "Error updating event: " . $conn->error;
        }
    }
} else {
    echo "Event ID not provided.";
}
?>

<!-- Display the update form -->
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Add your head content here -->
</head>

<body>
    <!-- Display the update form with pre-filled values -->
    <form method="post">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="<?php echo $eventData['title']; ?>" required>
        <br>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required><?php echo $eventData['description']; ?></textarea>
        <br>

        <!-- Add other form fields as needed -->

        <input type="submit" value="Update Event">
    </form>
</body>

</html>
