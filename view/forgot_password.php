<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href= "../assets/css/forgot_password.css">
</head>
<body>
    
<header class="header">
    <div class="logo">Blogging</div>
</header>

    <div class="forgot-container">
      
        
        <h2>Forgot your password?</h2>
        <p>Enter your Email and we’ll help you reset your password.</p>
        <form method="post" action="email_verification.php" onsubmit="return validateName()"  >
            <input type="email" name="email" id="email" placeholder="Enter Email " >
            <button type="submit">Continue</button>
            <p id="msg"></p>
        </form>
       
    </div>
    <script src="../assets/js/forgot_password.js"></script> 
     

    
</body>
</html>