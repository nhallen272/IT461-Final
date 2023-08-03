<?php
session_start(); // Start or resume the session

// Check if the user is not logged in and redirect to login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The Covid Connection - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>


    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.html">The Covid Connection</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="about.html">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="resources.html">Resources</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="register.php">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="donations.html">Donations</a>
              </li>
            <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
            </li>
          </ul>
        </div>
      </nav>
    
      
      <div class="container mt-5">
      <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
        <div id="successMessage" style="display: none; color: green;"></div>
        <form id="donationForm" method="post">
            <div>
                <label for="donation_amount">Donation Amount (USD):</label>
                <input type="number" step="0.01" min="0" id="donation_amount" required>
            </div>
            <button type="submit" id="donateButton">Donate Now!</button>
        </form>
        <div id="result"></div>
    <br>
    <a href="logout.php">Logout</a> <!-- Add a link to the logout script (logout.php) to allow users to log out -->
      
    <!-- Script to show the donation amount on the page dynamically -->
    <script src="js/send_donation.js"></script>
    <hr>

    <footer>
        <div class="container"><p>&copy; 2023 The Covid Connection. All rights reserved.</p></div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>