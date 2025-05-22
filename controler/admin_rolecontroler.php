<?php
session_start();


if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = [
        ["id" => 1, "username" => "admin", "email" => "admin@example.com", "role" => "Admin"],
        ["id" => 2, "username" => "john_doe", "email" => "john@example.com", "role" => "User"],
        ["id" => 3, "username" => "jane_smith", "email" => "jane@example.com", "role" => "Subscriber"]
    ];
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['role']) && is_array($_POST['role'])) {
        $users = $_SESSION['users'];
        foreach ($users as $index => $user) {
            $newRole = $_POST['role'][$user['id']] ?? $user['role'];
            $users[$index]['role'] = $newRole;
        }
        $_SESSION['users'] = $users;
    } else {
        $error = "No roles submitted.";
    }
}

$users = $_SESSION['users'];
?>