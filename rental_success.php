<?php
session_start(); // Start session at the beginning

if (!isset($_SESSION['rental_id'])) {
    echo "Invalid rental data!";
    exit();
}

// Retrieve rental details from session
$rental_id = $_SESSION['rental_id'];
$user_name = $_SESSION['user_name'];
$vehicle_name = $_SESSION['vehicle_name'];
$total_price = $_SESSION['total_price'];
$email = $_SESSION['user_email']; // Correct way to get user's contact number

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Success</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 20px;
        }

        .bill-container {
            max-width: 450px;
            margin: 50px auto;
            padding: 30px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .bill-container h2 {
            color: #28a745;
            font-size: 1.8em;
        }

        .bill-container .success-icon {
            font-size: 50px;
            color: #28a745;
            margin-bottom: 15px;
        }

        .bill-details {
            font-size: 1.1em;
            text-align: left;
            margin: 15px 0;
            padding: 15px;
            background: #f8f8f8;
            border-radius: 8px;
        }

        .bill-details p {
            margin: 8px 0;
            font-size: 1em;
        }

        .bill-details strong {
            color: #333;
        }

        .home-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 1em;
            text-decoration: none;
            background: #007bff;
            color: white;
            border-radius: 5px;
            transition: 0.3s ease-in-out;
        }

        .home-btn:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>

<div class="bill-container">
    <div class="success-icon">✅</div>
    <h2>Rental Successful!</h2>
    <p>Your order is confirmed. Please check your email for the order details.</p>
    
    <div class="bill-details">
        <p><strong>Rental ID:</strong> <?php echo htmlspecialchars($rental_id); ?></p>
        <p><strong>Name:</strong> <?php echo htmlspecialchars($user_name); ?></p>
        <p><strong>Vehicle:</strong> <?php echo htmlspecialchars($vehicle_name); ?></p>
        <p><strong>Total Price:</strong> $<?php echo htmlspecialchars($total_price); ?></p>
       
    </div>

    

    <a href="index.php" class="home-btn">Back to Home</a>
</div>

</body>
</html>
