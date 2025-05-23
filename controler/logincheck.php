<?php
session_start();
require_once('../model/userModel.php');

if (isset($_POST['submit'])) {
    $user = [
        'username' => trim($_POST['username']),
        'password' => trim($_POST['password'])
    ];
    if ($user['username'] === "" || $user['password'] === "") {
        $_SESSION['login_error'] = "Username and password cannot be empty!";
        header("Location: ../view/login.php");
        exit();
    } elseif (login($user)) {
        $_SESSION['username'] = $user['username'];
        header("Location: ../view/dashboard.php");
        exit();
    } else {
        $_SESSION['login_error'] = "Invalid username or password!";
        header("Location: ../view/login.php");
        exit();
    }
} else {
    header("Location: ../view/login.php");
    exit();
}
?>