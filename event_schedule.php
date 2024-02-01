<?php
session_start();
include_once 'db_connection.php';
include_once 'logout.php';

// Check if the user is an exhibitor
if (!isset($_SESSION['username']) && $_SESSION['role'] !== 'exhibitor') {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['exhibitor_id'];

// Fetch exhibitor events data based on user ID
$sql = "SELECT * FROM eventschedule WHERE user_id = $user_id";
$result = $conn->query($sql);

// Fetch the event data into an array
$eventData = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $eventData[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Schedule</title>
    <!-- Import the Nunito font from Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
        }

        nav {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        .container {
            display: flex;
        }

        .sidebar {
            width: 20%;
            background-color: #f4f4f4;
            padding: 20px;
            height: 100vh;
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

        .logout-btn {
            text-align: right;
            margin-top: 10px;
        }

        .logout-btn input {
            background-color: #f44336;
            color: #fff;
            cursor: pointer;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
        }

        .logout-btn input:hover {
            background-color: #d32f2f;
        }

        .event-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }

        .event-card {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
        }

        .event-card a {
            display: block;
            margin-top: 10px;
            text-decoration: none;
            color: #333;
            background-color: #4caf50;
            padding: 10px;
            text-align: center;
            border-radius: 4px;
            cursor: pointer;
        }

        .event-card a:hover {
            background-color: #45a049;
        }
        form {
        margin-bottom: 20px;
    }

    form label {
        display: block;
        margin-bottom: 5px;
    }

    form input {
        width: 50%;
        padding: 8px;
        margin-bottom: 15px;
        box-sizing: border-box;
    }

    form input[type="submit"] {
        background-color: #4caf50;
        color: #fff;
        cursor: pointer;
        border: none;
        padding: 10px 15px;
        border-radius: 4px;
    }

    form input[type="submit"]:hover {
        background-color: #45a049;
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
            <h2>Event Schedule</h2>
            <!-- Form for adding new event schedule -->
            <form method="post" action="add_event.php">
                <label for="event_name">Event Name:</label>
                <input type="text" id="event_name" name="event_name" required>
                <br>

                <label for="speaker">Speaker:</label>
                <input type="text" id="speaker" name="speaker" required>
                <br>

                <label for="start_time">Start Time:</label>
                <input type="datetime-local" id="start_time" name="start_time" required>
                <br>

                <label for="end_time">End Time:</label>
                <input type="datetime-local" id="end_time" name="end_time" required>
                <br>

                <label for="capacity">Capacity:</label>
                <input type="number" id="capacity" name="capacity" required>
                <br>

                <input type="submit" value="Add Event">
            </form>
            <div class="event-grid">
                <?php foreach ($eventData as $event) : ?>
                    <div class="event-card">
                        <p><strong>Event Name:</strong> <?php echo $event['event_name']; ?></p>
                        <p><strong>Event Description:</strong> <?php echo $event['event_description']; ?></p>
                        <p><strong>Location:</strong> <?php echo $event['event_location']; ?></p>
                        <p><strong>Date:</strong> <?php echo $event['event_date']; ?></p>
                        <p><strong>Speaker:</strong> <?php echo $event['speaker']; ?></p>
                        <p><strong>Start Time:</strong> <?php echo $event['time']; ?></p>
                        <p><strong>End Time:</strong> <?php echo $event['end_time']; ?></p>
                        <p><strong>Capacity:</strong> <?php echo $event['capacity']; ?></p>
                        <a href="update_event.php?id=<?php echo $event['id']; ?>">Update</a>
                        <a href="delete_event.php?id=<?php echo $event['id']; ?>">Delete</a>
                        <!-- Add more event details as needed -->
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>

</html>
