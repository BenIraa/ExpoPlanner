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

// Fetch exhibitor products and services data based on user ID
$sql = "SELECT * FROM exhibitorproducts WHERE exhibitor_id = $user_id";
$result = $conn->query($sql);

// Fetch the product data into an array
$productData = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $productData[] = $row;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exhibitor Products</title>
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

        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }

        .product-card {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
        }

        .product-card img {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
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
            <h2>Exhibitor Products</h2>
            <div class="product-grid">
                <?php foreach ($productData as $product) : ?>
                    <div class="product-card">
                        <img src="<?php echo $product['product_image']; ?>" alt="Product Image">
                        <p><strong>Product Name:</strong> <?php echo $product['product_name']; ?></p>
                        <p><strong>Description:</strong> <?php echo $product['product_description']; ?></p>
                        <p><strong>Price:</strong> $<?php echo number_format($product['price'], 2); ?></p>
                        <p><strong>Creation Date:</strong> <?php echo $product['product_creation_date']; ?></p>
                        <p><strong>Expired Date:</strong> <?php echo $product['product_expired_date']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>

</html>
