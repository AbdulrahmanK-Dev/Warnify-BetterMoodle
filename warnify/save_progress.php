<?php
session_start();
include("config.php");

$subjectProg_ID = $_POST['subjectProg_ID'] ?? 1;
$user_id = $_POST['user_id'];



if (!$user_id) {
    header("Location: login.html");
    exit;
}



$stmt = $con->prepare("
    UPDATE progress 
    SET completed = 0, completed_at = NULL 
    WHERE user_id = ? AND topic_id IN (
        SELECT topic_id FROM topics WHERE subjectProg_ID = ?
    )
");

$stmt->bind_param("ii", $user_id, $subjectProg_ID);
$stmt->execute();


if (!empty($_POST['topics'])) {
    foreach ($_POST['topics'] as $topic_id => $value) {
        $stmt = $con->prepare("
            UPDATE progress 
            SET completed = 1, completed_at = NOW() 
            WHERE user_id = ? AND topic_id = ?
        ");
        $stmt->bind_param("ii", $user_id, $topic_id);
        $stmt->execute();
    }
}
header("Location: web.php");
exit;

?>