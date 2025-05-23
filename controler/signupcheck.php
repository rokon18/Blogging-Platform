<?php
session_start();
require_once('../model/userModel.php');

if (isset($_POST['submit'])) {
    $name = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirmPassword = trim($_POST['confirm_password']);

    if ($name == "" || $email == "" || $password == "" || $confirmPassword == "") {
        echo "Fields cannot be empty!";
    } elseif (strlen($name) < 2) {
        echo "Name must contain at least two characters!";
    } elseif (!ctype_alpha($name[0])) {
        echo "Name must start with a letter!";
    } else {
        for ($i = 0; $i < strlen($name); $i++) {
            $char = $name[$i];
            if (!ctype_alpha($char) && $char !== '.' && $char !== '-' && $char !== ' ') {
                echo "Name can only contain letters, dots (.), dashes (-), and spaces!";
                exit();
            }
        }
    }

    if (strpos($email, "@") === false || strpos($email, ".") === false) {
        echo "Email must contain '@' and '.'!";
    } elseif (strpos($email, "@") > strrpos($email, ".")) {
        echo "'@' must appear before '.' in email!";
    } elseif (strlen($password) < 6) {
        echo "Password must contain at least six characters!";
    } elseif ($confirmPassword !== $password) {
        echo "Passwords do not match!";
    } else {
        $con = getDatabaseConnection();
        $username = mysqli_real_escape_string($con, $name);
        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
            echo "Username already exists! Please choose another.";
        } else {
            $user = [
                'username' => $name,
                'password' => $password,
                'email' => $email
            ];
            if (signup($user)) {
                $_SESSION['status'] = true;
                echo "signup successful!";
                $_SESSION['username'] = $name;
                
                 header("Location: ../view/login.php");
                 exit();
            } else {
                echo "Signup failed! Please try again.";
            }
        }
    }
} 