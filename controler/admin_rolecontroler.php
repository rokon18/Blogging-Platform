<?php

require_once '../model/userModel.php';

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['role']) && is_array($_POST['role'])) {
        foreach ($_POST['role'] as $id => $newRole) {
            if (!updateUserRole($id, $newRole)) {
                $error = "Failed to update role for user ID $id.";
            }
        }
        if (empty($error)) {
            $success = "Roles updated successfully.";
        }
    } else {
        $error = "No roles submitted.";
    }
}

$users = getAllUsers();
?>