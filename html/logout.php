<?php
session_start();

// Reset session variables
$_SESSION = array();

// Destroy session
session_destroy();

// Redirect to index.html
header("Location: index.html");
exit;
?>