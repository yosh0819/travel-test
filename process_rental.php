<?php
session_start();
include 'includes/dbh.inc.php'; // Include your database connection file

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Required files
require 'PHPMailer-master\PHPMailer-master\src\Exception.php';
require 'PHPMailer-master\PHPMailer-master\src\PHPMailer.php';
require 'PHPMailer-master\PHPMailer-master\src\SMTP.php';

// Now retrieve rental_id from session
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if values are passed through POST and assign them
    $rental_id = $_POST['rental_id'];
    $user_id = $_POST['user_id'];
    $user_name = $_POST['user_name'];
    $email = $_POST['user_email'];
    $vehicle_name = $_POST['vehicle_name'];
    $vehicle_image = $_POST['vehicle_image'];
    $total_price = $_POST['total_price'];

    // Store in session
    $_SESSION['rental_id'] = $rental_id;
    $_SESSION['user_id'] = $user_id;
    $_SESSION['user_name'] = $user_name;
    $_SESSION['user_email'] = $email;
    $_SESSION['vehicle_name'] = $vehicle_name;
    $_SESSION['vehicle_image'] = $vehicle_image;
    $_SESSION['total_price'] = $total_price;

    // Validate inputs
    if (empty($rental_id) || empty($user_id) || empty($user_name) || empty($email) || empty($vehicle_name) || empty($vehicle_image) || empty($total_price)) {
        echo "All fields are required!";
        exit();
    }

    // SQL query to insert into rented_vehicles table
    $sql = "INSERT INTO rented_vehicles (rental_id, usersId, user_name, vehicle_name, vehicle_image, rented_price) 
            VALUES (?, ?, ?, ?, ?, ?)";

    // Prepare the statement
    $stmt = mysqli_prepare($conn, $sql);
    if (!$stmt) {
        die("SQL Error: " . mysqli_error($conn));
    }

    // Correct bind_param usage
    $stmt->bind_param("sisssi", $rental_id, $user_id, $user_name, $vehicle_name, $vehicle_image, $total_price);

    // Execute the statement
    if (!$stmt->execute()) {
        die("Execution failed: " . $stmt->error);
    }
    $stmt->close();

    // Send the email after the rental has been confirmed and inserted into the database
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  
        $mail->SMTPAuth = true;
        $mail->Username = 'traveld69@gmail.com';  
        $mail->Password = 'txhiquxyulwtyftv';  
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;  

        // Recipients
        $mail->setFrom('traveld69@gmail.com', 'Dream Travel');
        $mail->addAddress($email, $user_name);  

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Vehicle Rental Confirmation';
        $mail->Body = "
            <h1>Your Vehicle Rental has been Confirmed!</h1>
            <p>Dear $user_name,</p>
            <p>Your rental ID: <strong>$rental_id</strong> has been successfully processed.</p>
            <p><strong>Vehicle:</strong> $vehicle_name</p>
            <p><strong>Total Price:</strong> $$total_price</p>
            <p>Thank you for choosing our services. We look forward to serving you!</p>
        ";

        if ($mail->send()) {
            header("Location: rental_success.php?success&rental_id=" . $rental_id);
            exit();
        } else {
            throw new Exception("Error sending email: " . $mail->ErrorInfo);
        }
    } catch (Exception $e) {
        echo "An error occurred: " . $e->getMessage();
    }
}
?>
