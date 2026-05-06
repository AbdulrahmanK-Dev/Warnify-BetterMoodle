<?php
include("config.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user_id = $_SESSION['user_id'];

    if (!$user_id) {
        die("Error: User ID not found in session. Please sign up again.");
    }

    $Subjects = array(
        $_POST['WebDay'],   
        $_POST['DSADay'], 
        $_POST['CyberDay'], 
        $_POST['SoftEngDay'], 
        $_POST['AdvProgDay'], 
        $_POST['CompArchDay']
    );

 
    foreach($Subjects as $subj) {
        if(!empty($subj) && $subj != "Choose...") {
            $setupSQL = "INSERT INTO student_schedules(student_id, subject_id) VALUES ($user_id, $subj)";
            if(!mysqli_query($con, $setupSQL)) {
                echo "Error: " . mysqli_error($con) . "<br>";
            } 
        }
    }

    header("Location:homepage.php");
    

}
?>