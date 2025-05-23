<?php

include_once "../model/db.php";

// MySQL table structure for contact messages:
// CREATE TABLE contact_messages (
//   id INT AUTO_INCREMENT PRIMARY KEY,
//   name VARCHAR(100) NOT NULL,
//   email VARCHAR(255) NOT NULL,
//   subject VARCHAR(255) NOT NULL,
//   message TEXT NOT NULL,
//   created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
// );

function createContactMessage($name, $email, $subject, $message) {
    $conn = getDatabaseConnection();
    $sql = "INSERT INTO contact_messages (name, email, subject, message) VALUES ('" . mysqli_real_escape_string($conn, $name) . "', '" . mysqli_real_escape_string($conn, $email) . "', '" . mysqli_real_escape_string($conn, $subject) . "', '" . mysqli_real_escape_string($conn, $message) . "')";
    return mysqli_query($conn, $sql);
}

function getContactMessageById($id) {
    $conn = getDatabaseConnection();
    $sql = "SELECT * FROM contact_messages WHERE id = '" . intval($id) . "'";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
}

function getAllContactMessages() {
    $conn = getDatabaseConnection();
    $sql = "SELECT * FROM contact_messages ORDER BY created_at DESC";
    $result = mysqli_query($conn, $sql);
    $messages = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $messages[] = $row;
    }
    return $messages;
}

function deleteContactMessage($id) {
    $conn = getDatabaseConnection();
    $sql = "DELETE FROM contact_messages WHERE id = '" . intval($id) . "'";
    return mysqli_query($conn, $sql);
}