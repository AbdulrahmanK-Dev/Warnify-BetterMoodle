<?php
include("config.php");
session_start();

$userSignup = "INSERT INTO user(fName, lName, email, password, major) 
               VALUES ('$_POST[fName]', '$_POST[lName]', '$_POST[email]', '$_POST[password]', '$_POST[major]')";

if(mysqli_query($con, $userSignup)) {
   
    $user_id = mysqli_insert_id($con); 
    
 
    $_SESSION['user_id'] = $user_id; /* Need dis for setup*/
    $_SESSION['fName'] = $_POST['fName'];
    
    header("Location: scheduleSetup.html");
    exit;
} else {
    echo "Signup Error: " . mysqli_error($con);
}
?>