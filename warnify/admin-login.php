<?php
session_start();
include("config.php");

$email = trim($_POST['email']);
$password = $_POST['password'];

$stmt = $con->prepare("SELECT id, fName, lName, email, password, role, is_banned FROM user WHERE email = ?");
if (!$stmt) {
    die("SQL error: " . $con->error);
}

$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    if ($user['is_banned']) {
        die("Your account has been banned.");
    }

    if (password_verify($password, $user['password'])) {
        if ($user['role'] !== 'admin') {
            die("Access denied. Admin accounts only.");
        }

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['fName']   = $user['fName'];
        $_SESSION['role']    = $user['role'];

        header("Location: admin-dashboard.php");
        exit();
    } else {
        echo "Invalid password.";
    }
} else {
    echo "No admin found.";
}

$stmt->close();
$con->close();
?>