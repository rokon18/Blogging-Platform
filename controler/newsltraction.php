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
        if (createNewsletterSignup($email)) {
            $newsletter_subscribed = [];
            if (isset($_COOKIE['newsletter_subscribed'])) {
                $newsletter_subscribed = json_decode($_COOKIE['newsletter_subscribed'], true);
                if (!is_array($newsletter_subscribed)) {
                    $newsletter_subscribed = [];
                }
            }
            $newsletter_subscribed[$email] = [
                'email' => $email,
                'date' => date('Y-m-d H:i:s')
            ];
            setcookie('newsletter_subscribed', json_encode($newsletter_subscribed), time() + 60*60*24*30, "/"); // 30 days
            $success_message = "✅ Thank you for subscribing!";
        } else {
            $success_message = "❌ Subscription failed. Please try again.";
        }
    }
}
?>
