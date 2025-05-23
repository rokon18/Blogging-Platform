<?php
session_start();

$code1 = isset($_POST['code1']) ? $_POST['code1'] : '';
$code2 = isset($_POST['code2']) ? $_POST['code2'] : '';
$code3 = isset($_POST['code3']) ? $_POST['code3'] : '';
$code4 = isset($_POST['code4']) ? $_POST['code4'] : '';

if ($code1 === '' || $code2 === '' || $code3 === '' || $code4 === '') {
    $_SESSION['error'] = 'Verification code cannot be empty.';
    header("Location: ../view/email_verification.php");
    exit();
}

$entered_code = $code1 . $code2 . $code3 . $code4;
$correct_code = isset($_SESSION['verification_code']) ? $_SESSION['verification_code'] : '';

if ($entered_code !== $correct_code) {
    $_SESSION['error'] = 'Invalid verification code. Please try again.';
    header("Location: ../view/email_verification.php");
    exit();
}

unset($_SESSION['error']);
header("Location: ../view/login.php");
exit();
?>