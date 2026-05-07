<?php
include("config.php");
$pass = password_hash("admin123", PASSWORD_DEFAULT);
$sql = "INSERT INTO user (fName, lName, email, password, major, role) 
        VALUES ('Admin', 'User', 'admin@warnify.com', '$pass', 'N/A', 'admin')
        ON DUPLICATE KEY UPDATE role='admin'";
mysqli_query($con, $sql);
echo "Admin created/updated.";
?>