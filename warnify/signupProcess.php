<?php
session_start();

$fName = $lName = $email = $password = $major = $terms = "";
$hasError = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $fName = $_POST['fName'] ?? '';

    if (empty($fName)) {
        $_SESSION['fNameErr'] = "First name cannot be empty";
        $hasError = true;
    } else {
        $fName = test_input($fName);
        if (!preg_match('/^[a-zA-Z ]*$/', $fName)) {
            $_SESSION['fNameErr'] = "First name must contain letters only";
            $hasError = true;
        }
    }

    
    $lName = $_POST['lName'] ?? '';

    if (empty($lName)) {
        $_SESSION['lNameErr'] = "Last name cannot be empty";
        $hasError = true;
    } else {
        $lName = test_input($lName);
        if (!preg_match('/^[a-zA-Z ]*$/', $lName)) {
            $_SESSION['lNameErr'] = "Last name must contain letters only";
            $hasError = true;
        }
    }

    
    $email = $_POST['email'] ?? '';
    $email = trim(strtolower($_POST['email'])); // trim + lowercase for consistency

    if (empty($email)) {
        $_SESSION['emailErr'] = "Email cannot be empty";
        $hasError = true;
    } else {
        $email = test_input($email);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['emailErr'] = "Invalid email format";
            $hasError = true;
        }
    }



  
    $password = $_POST['password'] ?? '';

    if (empty($password)) {
        $_SESSION['passwordErr'] = "Password is required";
        $hasError = true;
    } elseif (strlen($password) < 8) {
        $_SESSION['passwordErr'] = "Password must be at least 8 characters";
        $hasError = true;
    } elseif (!preg_match('/[A-Z]/', $password)) {
        $_SESSION['passwordErr'] = "Password must include an uppercase letter";
        $hasError = true;
    } elseif (!preg_match('/[0-9]/', $password)) {
        $_SESSION['passwordErr'] = "Password must include a number";
        $hasError = true;
    }

    
    $major = $_POST['major'] ?? '';

    if (empty($major)) {
        $_SESSION['majorErr'] = "Must choose a major";
        $hasError = true;
    }

   
    $terms = $_POST['terms'] ?? '';

    if (empty($terms)) {
        $_SESSION['termsErr'] = "You must agree to terms";
        $hasError = true;
    }

    
    if ($hasError) {
        header("Location: signup.php"); 
        exit();
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT); //Hashed password thought its cool

    include("config.php");


    $userSignup = "INSERT INTO user(fName, lName, email, password, major) 
                   VALUES ('$fName', '$lName', '$email', '$hashedPassword', '$major')";

    if (mysqli_query($con, $userSignup)) {

        $_SESSION['user_id'] = mysqli_insert_id($con);
        $_SESSION['fName'] = $fName;

        header("Location: scheduleSetup.html");

        exit();
        
    } else {
        echo "Signup Error: " . mysqli_error($con);
    }
}


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>