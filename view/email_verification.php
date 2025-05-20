<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Email Verification</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/email_varification.css">
</head>
<body>
    <div class="verification-container">
        <div class="icon">&#9993;</div>
        <h2>VERIFY YOUR EMAIL ADDRESS</h2>
        <hr>
        <div class="sent-to">
            A verification code has been sent <br>
           
        </div>
        <div class="desc">
            Please check your inbox and enter the verification code below to verify your email address. The code will expire in <span class="timer">14:48</span>.
        </div>
        <form method="post" action="../controler/email_verificationcheck.php">
            <div class="code-inputs">
                <input type="text" maxlength="1" required>
                <input type="text" maxlength="1" required>
                <input type="text" maxlength="1" required>
                <input type="text" maxlength="1" required>
       
            </div>
            <button type="submit">Verify</button>
        </form>
        <div class="actions">
            <a href="#">Resend code</a>
            
        </div>
    </div>
    
</body>
</html>