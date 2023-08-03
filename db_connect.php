<?php
   
    $servername = "localhost"; 
    $username = "root"; 
    $password = "";
   
    $database = "covid";
   
     // Create connection 
     $conn = mysqli_connectd($servername, 
         $username, $passwor, $database);
   

    if($conn) {
        echo "success"; 
    } 
    else {
        die("Error". mysqli_connect_error()); 
    } 
?>