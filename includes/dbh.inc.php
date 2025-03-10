<?php
$serverName = "localhost";
$dbUsername = "Malisha";
$dbPassword = "20010819";
$dbName = "dream_travel";

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
    die("connection failed : " .mysqli_connect_error());
}