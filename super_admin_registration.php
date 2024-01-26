<?php
// Include necessary files or configurations
include_once 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process the form data
    $username = $_POST['username'];
    $password_hash = password_hash($_POST['password_hash'], PASSWORD_DEFAULT);
    $role = $_POST['role'];  // Added role field
    // Add more fields as needed

    // Simple validation
    if (empty($username) || empty($password_hash) || empty($role)) {
        $error = 'All fields are required.';
    } else {
        // Insert the super admin data into the Users table
        $sql = "INSERT INTO Users (username, password_hash, role) VALUES ('$username', '$password_hash', '$role')";

        if ($conn->query($sql) === TRUE) {
            // Registration successful, redirect to login page
            header('Location: login.php');
            exit;
        } else {
            // Display an error message
            $error = 'Error: ' . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
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

        input, select {
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
   
    <?php if (isset($error)) : ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    
    <form method="post">
    <h2>User Registration</h2>
        <label for="username">Username:</label>
        <input type="text" name="username" required>
        <br>
        <label for="password_hash">Password:</label>
        <input type="password" name="password_hash" required>
        <br>
        <label for="role">Role:</label>
        <select name="role" required>
            <option value="super_admin">Super Admin</option>
            <option value="exhibitor">Exhibitor</option>
        </select>
        <br>
        <!-- Add more input fields as needed -->
        <input type="submit" value="Register">
        <div class="login-link">
            Already have an account? <a href="login.php">Login</a>
        </div>
    </form>
</body>
</html>
