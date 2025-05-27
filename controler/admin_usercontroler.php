<?php

require_once '../model/userModel.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_id'])) {
    $deleteId = $_POST['delete_id'];
    deleteUser($deleteId);
}


$users = getAllUsers();
?>