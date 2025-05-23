<?php
$email = "";
$email_error = $consent_error = "";
$success_message = "";
$consent = false;

include_once "../model/newsltrModel.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {

    if (empty($_POST["email"])) {
        $email_error = "Email is required.";
    } else {
        $email = trim($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_error = "Invalid email format.";
        }
    }

    $consent = isset($_POST["consent"]);
    if (!$consent) {
        $consent_error = "You must agree to the privacy policy.";
    }


    if (empty($email_error) && empty($consent_error)) {
        // Insert into database using model function
        if (createNewsletterSignup($email)) {
            $success_message = "✅ Thank you for subscribing!";
        } else {
            $success_message = "❌ Subscription failed. Please try again.";
        }
    }
}
?>
