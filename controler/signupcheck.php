<?php
session_start();
require_once('../model/userModel.php');

if (isset($_POST['submit'])) {
    $name = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirmPassword = trim($_POST['confirm_password']);

    if ($name == "" || $email == "" || $password == "" || $confirmPassword == "") {
        $_SESSION['signup_error'] = "Fields cannot be empty!";
        header("Location: ../view/signup.php");
        exit();
    } elseif (strlen($name) < 2) {
        $_SESSION['signup_error'] = "Name must contain at least two characters!";
        header("Location: ../view/signup.php");
        exit();
    } elseif (!ctype_alpha($name[0])) {
        $_SESSION['signup_error'] = "Name must start with a letter!";
        header("Location: ../view/signup.php");
        exit();
    } else {
        for ($i = 0; $i < strlen($name); $i++) {
            $char = $name[$i];
            if (!ctype_alpha($char) && $char !== '.' && $char !== '-' && $char !== ' ') {
                $_SESSION['signup_error'] = "Name can only contain letters, dots (.), dashes (-), and spaces!";
                header("Location: ../view/signup.php");
                exit();
            }
        }
    }

    if (strpos($email, "@") === false || strpos($email, ".") === false) {
        $_SESSION['signup_error'] = "Email must contain '@' and '.'!";
        header("Location: ../view/signup.php");
        exit();
    } elseif (strpos($email, "@") > strrpos($email, ".")) {
        $_SESSION['signup_error'] = "'@' must appear before '.' in email!";
        header("Location: ../view/signup.php");
        exit();
    } elseif (strlen($password) < 6) {
        $_SESSION['signup_error'] = "Password must contain at least six characters!";
        header("Location: ../view/signup.php");
        exit();
    } elseif ($confirmPassword !== $password) {
        $_SESSION['signup_error'] = "Passwords do not match!";
        header("Location: ../view/signup.php");
        exit();
    } 
    else {
        $con = getDatabaseConnection();
        $username = mysqli_real_escape_string($con, $name);
        $email = mysqli_real_escape_string($con, $email);

        
        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
            $_SESSION['signup_error'] = "Username already exists! Please choose another.";
            header("Location: ../view/signup.php");
            exit();
        }

        
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
            $_SESSION['signup_error'] = "Email already registered! Please use another email.";
            header("Location: ../view/signup.php");
            exit();
        }

        
        $user = [
            'username' => $name,
            'password' => $password,
            'email' => $email
        ];
        if (signup($user)) {
            
            header("Location: ../view/login.php");
            exit();
        } else {
            $_SESSION['signup_error'] = "Signup failed! Please try again.";
            header("Location: ../view/signup.php");
            exit();
        }
    }
} elseif (isset($_POST['username'])) {
    $username = trim($_POST['username']);
    $con = getDatabaseConnection();
    $usernameEscaped = mysqli_real_escape_string($con, $username);
    $sql = "SELECT * FROM users WHERE username='$usernameEscaped'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "Username already exists!";
    } else {
        echo "Username available";
    }
}
?>