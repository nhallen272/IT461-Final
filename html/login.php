<?php
session_start(); // Start session

// Check if already logged in
if (isset($_SESSION['username'])) {
    header("Location: dashboard.php"); 
    exit;
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data, allow email or username for login
    $loginIdentifier = $_POST['login_identifier'];
    $password = $_POST['password'];

    // Connect to the MySQL db
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "covid";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if user exists in DB
    $sql = "SELECT username, password FROM users WHERE email = ? OR username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $loginIdentifier, $loginIdentifier);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
      // found user
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $row['username'];
            header("Location: dashboard.php"); // Redirect to the login portal
            exit;
        } else {
            // Wrong password
            $error_message = "Invalid login credentials";
        }
    } else {
        // User not found
        $error_message = "User not found";
    }

    $stmt->close();
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The Covid Connection - Login</title>
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
        <h1>Login to Your Account</h1>
        <?php if (isset($error_message)) : ?>
        <p style="color: red;"><?php echo $error_message; ?></p>
        <?php endif; ?>
        <form method="post">
        <div>
            <label for="login_identifier">Email or Username:</label>
            <input type="text" id="login_identifier" name="login_identifier" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Login</button>
    </form>
        
      </div>


    <hr>
    <footer>
        <div class="container"><p>&copy; 2023 The Covid Connection. All rights reserved.</p></div>  
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>