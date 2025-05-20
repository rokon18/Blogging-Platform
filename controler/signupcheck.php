<?php


require_once('../model/signup.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

   
    if (!empty($username) && !empty($password) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
      
        $result = insertUser($username, $password, $email);

        if ($result) {
            header("Location: ../view/email_verification.php");
            exit();
        } else {
            echo "Database error!";
        }
    } else {
        echo "Invalid input!";
    }
} else {
    echo "Invalid request method!";
}
?>
