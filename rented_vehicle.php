<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Rental</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .rental-form {
            max-width: 400px;
            margin: 30px auto;
            margin-top: -5px;
            padding: 40px;
            background: #f8f8f8;
            border-radius: 8px;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
        }
        .rental-form h3 {
            text-align: center;
            margin-bottom: 15px;
            font-size: 1.3em;
        }

        .rental-form h2 {
            margin-top: -20px;
        }
        
        .rental-form label {
            font-weight: bold;
            display: block;
            font-size: 0.9em;
            margin-top: 8px;
        }
        .rental-form input {
            width: 100%;
            padding: 8px;
            margin-top: 3px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 0.9em;
        }
        .rental-form button {
            width: 100%;
            padding: 10px;
            margin-top: 15px;
            background: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1em;
        }

        .rental-form button:hover {
            background: #218838;
        }

        /*.vehicle-info img {
            max-width: 100px; /* Adjust width 
            max-height: 50px; /* Adjust height 
           
            height: auto;
            max-height: 300px;
            display: block;
            margin: 10px auto;
        }

        .vehicle-info p {
            text-align: center;
            font-size: 1.1em;
            font-weight: bold;
            margin: 5px 0;
        }*/

   /* .vehicle-container {
    display: inline-block;
    align-items: center; /* Align image and text in the middle 
    gap: 15px; /* Space between image and text 
    
}

.vehicle-container img {
    max-width: 100px; /* Adjust width 
    max-height: 60px; /* Adjust height 
    border-radius: 5px; /* Optional: Rounded corners 
}

.vehicle-details {
    font-size: 1.1em;
    font-weight: bold;
}*/

.vehicle-info {
    display: flex;
    justify-content: center; /* Center everything horizontally */
    align-items: center; /* Align vertically in the middle */
    margin-bottom: 20px; /* Add some spacing below */
}

.vehicle-container {
    display: flex;
    align-items: center; /* Align image and text in the middle */
    gap: 15px; /* Space between image and text */
    background: #f8f8f8; /* Optional background */
    padding: 10px;
    border-radius: 8px;
    box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
    
    
}

.vehicle-container img {
    max-width: 120px; /* Adjust width */
    max-height: 80px; /* Adjust height */
    border-radius: 5px; /* Optional: Rounded corners */
    margin-top: 5px;
}

.vehicle-details {
    font-size: 1.1em;
    font-weight: bold;
    text-align: left; /* Align text properly */
    margin-top: -10px;
    margin-bottom: -10px;
}


    </style>
</head>
<body>

<header>
    <h1>Vehicle Rental</h1>
</header>

<?php
// Retrieve values from the URL parameters
$vehicle_name = isset($_GET['vehicle']) ? $_GET['vehicle'] : "Unknown Vehicle";
$vehicle_image = isset($_GET['image']) ? $_GET['image'] : "default.webp";
$quantity = isset($_GET['quantity']) ? $_GET['quantity'] : "0";
$total_price = isset($_GET['price']) ? $_GET['price'] : "0.00";

// Generate a unique rental ID (can use date + random number)
$rental_id = "RV" . mt_rand(10000, 99999);
?>

<section class="vehicle-info"> 
<div class="vehicle-container">
<img src="<?php echo htmlspecialchars($vehicle_image); ?>" alt="Selected Vehicle">
<div class="vehicle-details">
    <p>Vehicle: <?php echo htmlspecialchars($vehicle_name); ?> </p>
    <p>Quantity:<?php echo $quantity; ?></p>
    <p>Total Price: $<?php echo htmlspecialchars($total_price); ?></p>
</div>
</div>
</section>

<section class="rental-form">
    <h2>Rental ID:<?php echo htmlspecialchars($rental_id);?></h2>
    <h3>Confirm Your Rental</h3>
    <form action="process_rental.php" method="POST" id="rentalForm">
    <input type="hidden" name="rental_id" value="<?php echo htmlspecialchars($rental_id); ?>">
        <label for="user-id">User ID:</label>
        <input type="text" id="user-id" name="user_id" required placeholder="Enter your User ID">

        <label for="user-id">User Name:</label>
        <input type="text" id="user-name" name="user_name" required placeholder="Enter your Name">

        <label for="user-cno">Email Address:</label>
        <input type="email" id="user-email" name="user_email" required placeholder="Enter your Email">

        <input type="hidden" name="vehicle_name" value="<?php echo htmlspecialchars($vehicle_name); ?>">
        <input type="hidden" name="vehicle_image" value="<?php echo htmlspecialchars($vehicle_image); ?>">
        <input type="hidden" name="total_price" value="<?php echo htmlspecialchars($total_price); ?>">

        <button id="confirmRentalBtn">Confirm Rental</button>
        
    </form>
</section>


</body>
</html>
