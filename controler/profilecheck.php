<?php
require_once('../model/userModel.php');
session_start();

if (isset($_SESSION['username']) && isset($_FILES['profile_pic'])) {
    $username = $_SESSION['username'];
    if (updateProfilePic($username, $_FILES['profile_pic'])) {
        $_SESSION['profile_msg'] = "Profile picture updated successfully!";
    } else {
        $_SESSION['profile_msg'] = "Failed to update profile picture.";
    }
    header("Location: ../view/profile.php");
    exit();
}
?>