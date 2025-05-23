<?php

include_once "../model/db.php";

function createNewsletterSignup($email) {
    $conn = getDatabaseConnection();
    $sql = "INSERT INTO newslrtsignup (email) VALUES ('" . mysqli_real_escape_string($conn, $email) . "')";
    return mysqli_query($conn, $sql);
}

function getNewsletterSignupById($id) {
    $conn = getDatabaseConnection();
    $sql = "SELECT * FROM newslrtsignup WHERE id = '" . intval($id) . "'";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
}

function updateNewsletterSignup($id, $email) {
    $conn = getDatabaseConnection();
    $sql = "UPDATE newslrtsignup SET email = '" . mysqli_real_escape_string($conn, $email) . "' WHERE id = '" . intval($id) . "'";
    return mysqli_query($conn, $sql);
}

function deleteNewsletterSignup($id) {
    $conn = getDatabaseConnection();
    $sql = "DELETE FROM newslrtsignup WHERE id = '" . intval($id) . "'";
    return mysqli_query($conn, $sql);
}

function getAllNewsletterSignups() {
    $conn = getDatabaseConnection();
    $sql = "SELECT * FROM newslrtsignup ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);
    $signups = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $signups[] = $row;
    }
    return $signups;
}