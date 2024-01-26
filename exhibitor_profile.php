<?php
session_start();


include_once 'db_connection.php';
include_once 'logout.php';

if (!isset($_SESSION['username']) && $_SESSION['role'] !== 'exhibitor') {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['exhibitor_id'];

// Fetch exhibitor profile data based on user ID
$sql = "SELECT * FROM ExhibitorProfiles WHERE user_id = $user_id";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $profileData = $result->fetch_assoc();
} else {
    $profileData = null;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exhibitor Profile</title>
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
            height: 100vh; /* Set height to 100% of viewport height */
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

        .sidebar-links {
            list-style: none;
            padding: 0;
        }

        .sidebar-links li {
            margin-bottom: 10px;
        }

        .sidebar-links a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
            cursor: pointer;
            display: block;
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
            <h2>Exhibitor Profile</h2>
            <?php if ($profileData) : ?>
                <p><strong>Company Name:</strong> <?php echo $profileData['company_name']; ?></p>
                <p><strong>Industry Type:</strong> <?php echo $profileData['industry_type']; ?></p>
                <p><strong>Comapany Contact Person:</strong> <?php echo $profileData['contact_person_name']; ?></p>
                <p><strong>Contact email:</strong> <?php echo $profileData['contact_email']; ?></p>
                <p><strong>Contact Phone:</strong> <?php echo $profileData['contact_phone']; ?></p>
                <p><strong>Company Description:</strong> <?php echo $profileData['profile_description']; ?></p>
                <p><strong>Website Url:</strong> <?php echo $profileData['website_url']; ?></p>
                <p><strong>Social Media Url:</strong> <?php echo $profileData['social_media_links']; ?></p>
                <p><strong>Booth Preferences:</strong> <?php echo $profileData['booth_preferences']; ?></p>
                <p><strong>Created at:</strong> <?php echo $profileData['created_at']; ?></p>
                <p><strong>Nodified at  :</strong> <?php echo $profileData['updated_at']; ?></p>
                <!-- Add more profile fields as needed -->
            <?php else : ?>
                <p>No exhibitor profile data found.</p>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>
