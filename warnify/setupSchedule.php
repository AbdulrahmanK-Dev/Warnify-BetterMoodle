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






 $subjectProg_ID = 1; //Hardcoded for now. We will probably only apply this for one subject to save time.
 $stmt = $con->prepare("
    INSERT IGNORE INTO progress (user_id, topic_id, completed, completed_at)
    SELECT ?, topic_id, 0, NULL
    FROM topics
    WHERE subjectProg_ID = ?
");

 $stmt->bind_param("ii", $user_id, $subjectProg_ID);
 $stmt->execute();
 $stmt->close();


    header("Location:homepage.php");
    

}
?>