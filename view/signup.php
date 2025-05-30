<?php
session_start();
$errorMsg = "";
if (isset($_SESSION['signup_error'])) {
    $errorMsg = $_SESSION['signup_error'];
    unset($_SESSION['signup_error']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../assets/css/signup.css">
</head>
<body>
    <div class="header">
        <label for="header">Blogging</label>
    </div>
    <section class="form">
        <h1 align="center">Create an Account</h1>
        <!--<form align="center" onsubmit="return validateName()">-->
         <form  align="center" method="post" action="../controler/signupcheck.php"onsubmit="return validateName()">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username">
            <span id="username-status" style="color:red; font-size:13px;"></span>
            <br><br>
            <label for="email">Email:</label>
            <input type="text" id="email" name="email">
            <br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" >
            <br><br>
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password">
            <br><br>
            <button type="submit" name="submit">Sign Up</button>
            <br><br>
            <p>Already have an account? <a href="login.php">Login</a></p>
            <p id="msg" style="color:red;"><?php echo $errorMsg; ?></p> 
        </form>
    </section>
    <script src="../assets/js/signup.js"></script>
</body>
</html>
