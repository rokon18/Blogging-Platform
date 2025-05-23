<?php
session_start();
$errorMsg = "";
if (isset($_SESSION['login_error'])) {
    $errorMsg = $_SESSION['login_error'];
    unset($_SESSION['login_error']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="../assets/css/loginform.css">
</head>
<body>

    <div class="header">
        <label for="header">Blogging</label>
    </div>

    <section class="form">
        <h1 align="center">Welcome back</h1>

      
        <form align="center" method="post" action="../controler/logincheck.php" onsubmit="return validateName()">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username">
            <br><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
            <br><br>

            <button type="submit" name="submit">Login</button>
            <br><br>

            <a href="forgot_password.php">Forgot Password?</a>
            <br>
            <p>Don't have an account? <a href="../view/signup.php">Sign Up</a></p>
            <p id="msg" style="color:red;"><?php echo $errorMsg; ?></p>
        </form>
    </section>

    <script src="../assets/js/login.js"></script>

</body>
</html>