<?php

session_start();

if (!isset($_SESSION['status'])) {
    header('Location: login.php');
    exit;
}

require_once '../model/postmodel.php';

$articles = getAllPosts();
?>