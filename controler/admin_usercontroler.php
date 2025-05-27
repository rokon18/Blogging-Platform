<?php

require_once '../model/userModel.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_id'])) {
    $deleteId = $_POST['delete_id'];
    deleteUser($deleteId);
}

// Fetch all users from the database
function getAllUsers() {
    $con = getDatabaseConnection();
    $sql = "SELECT id, username, email, role FROM users";
    $result = mysqli_query($con, $sql);
    $users = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }
    return $users;
}

$users = getAllUsers();
?>