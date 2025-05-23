<?php
$name = $email = $subject = $message = "";
$nameErr = $emailErr = $subjectErr = $messageErr = $success = "";

include_once "../model/contactmodel.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $valid = true;
    if (empty($_POST["name"])) {
        $nameErr = "Name is required.";
        $valid = false;
    } elseif (strlen(trim($_POST["name"])) < 3) {
        $nameErr = "Name must be at least 3 characters.";
        $valid = false;
    } else {
        $name = trim($_POST["name"]);
    }
    if (empty($_POST["email"])) {
        $emailErr = "Email is required.";
        $valid = false;
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format.";
        $valid = false;
    } else {
        $email = trim($_POST["email"]);
    }
    if (empty($_POST["subject"])) {
        $subjectErr = "Subject is required.";
        $valid = false;
    } else {
        $subject = trim($_POST["subject"]);
    }
    if (empty($_POST["message"])) {
        $messageErr = "Message is required.";
        $valid = false;
    } elseif (strlen(trim($_POST["message"])) < 10) {
        $messageErr = "Message must be at least 10 characters.";
        $valid = false;
    } else {
        $message = trim($_POST["message"]);
    }
    if ($valid) {
        if (createContactMessage($name, $email, $subject, $message)) {
            $success = "Thank you for contacting us!";
            $name = $email = $subject = $message = "";
        } else {
            $success = "There was an error saving your message. Please try again.". mysqli_error(getDatabaseConnection());;
        }
    }
}
?>
