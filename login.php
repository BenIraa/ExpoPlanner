<?php
session_start();

// Include necessary files or configurations
include_once 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check user credentials in the Users table
    $sql = "SELECT * FROM Users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $storedPassword = $row['password_hash'];
        $role = $row['role'];
        $exhibitor_id = $row['user_id']; 


        // Verify the password
        if (password_verify($password, $storedPassword)) {
            $_SESSION['username'] = $username;
            $_SESSION['exhibitor_id'] = $exhibitor_id;

            // Use relative paths for header
            if ($role === 'super_admin') {
                header('Location:super_admin_dashboard.php');
            } elseif ($role === 'exhibitor') {
                header('Location:exhibitor_dashboard.php');
            } elseif ($role === 'attendee') {
                header('Location:attendee_dashboard.php');
            } else {
                // Unexpected role, redirect to a default dashboard or landing page
                header('Location: generic_dashboard.php');
                // You might also log this unexpected scenario for further investigation
                error_log('Unexpected role encountered for user: ' . $username);
            }
            exit();
        }

        // If password verification fails
        $error = 'wrong password';
    } else {
        // If no user is found
        $error = 'Invalid username';
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Import the Nunito font from Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;  /* Use Nunito as the primary font */
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        p.error {
            color: red;
            margin-top: 10px;
        }
        .login-link {
            text-align: center;
            margin-top: 10px;
        }

        .login-link a {
            color: #333;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <form method="post">
        <h2>Login</h2>
        <?php if (isset($error)) : ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <label for="username">Username:</label>
        <input type="text" name="username" required>

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <input type="submit" value="Login">
        <div class="login-link">
            Don't have an account? <a href="super_admin_registration.php">Sign Up</a>
        </div>
    </form>

</body>
</html>

