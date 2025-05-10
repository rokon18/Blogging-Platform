<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $consent = isset($_POST["consent"]);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo("Invalid email format.");
    }

    if (!$consent) {
        echo("You must agree to the privacy policy.");
    }
}else{
    echo("Invalid request method.");}

   // $token = bin2hex(random_bytes(16));

   // $data = $email . "," . $token . "," . date("Y-m-d H:i:s") . "\n";
   // file_put_contents("subscribers_pending.txt", $data, FILE_APPEND);

   // $subject = "Confirm Your Newsletter Subscription";
   // $confirm_link = "https://yourdomain.com/confirm.php?email=" . urlencode($email) . "&token=" . $token;
   // $message = "Hi,\n\nPlease confirm your subscription by clicking this link:\n$confirm_link\n\nThank you!";
   // $headers = "From: no-reply@yourdomain.com";

   // if (mail($email, $subject, $message, $headers)) {
   //     echo "Confirmation email sent. Please check your inbox.";
   // } else {
      //  echo "Error sending confirmation email.";
    //}
?>
