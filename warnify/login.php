<?php



include("config.php");


$email = trim($_POST['email']);
$password = $_POST['password'];


$stmt = $con->prepare("SELECT id, email, password FROM user WHERE email = ?");

if (!$stmt) {
    die("SQL error: " . $con->error);
}

$stmt->bind_param("s", $email);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    if (password_verify($password, $user['password'])) {
        header("Location:homepage.php");
        exit();
      
    } else {
        echo "Invalid password.";
    }
} else {
    echo "No user found.";
}

$stmt->close();
$con->close();
?>