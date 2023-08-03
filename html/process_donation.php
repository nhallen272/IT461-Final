<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the donation amount from the AJAX request
    $donationAmount = $_POST['donation_amount'];

    // Process the donation amount  

    $successMessage = "Thanks for your donation of $" . $donationAmount . "!"; // Customize the success message
    echo $successMessage;
} else {
    header("HTTP/1.1 405 Method Not Allowed");
    echo "Invalid request method";
}
?>