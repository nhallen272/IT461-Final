<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the donation amount from the AJAX request
    $donationAmount = $_POST['donation_amount'];
    $username = $_SESSION['username'];

    
    // Connect to the db
    $dbservername = "localhost";
    $dbusername = "covidconnect";
    $dbpassword = "covid";
    $dbname = "covid";

    $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO donations (username, donation_amount) VALUES ('$username', $donationAmount)";
    if ($conn->query($sql) === TRUE) {
        // Donation success
        $successMessage = "Thanks for your donation of $" . $donationAmount . "!";
        echo $successMessage;
    } else {
        // Error handling for failed insertion 
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    header("HTTP/1.1 405 Method Not Allowed");
    echo "Invalid request method";
}
?>