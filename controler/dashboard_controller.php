<?php

session_start();

if (!isset($_SESSION['status'])) {
    header('Location: login.php');
    exit;
}

require_once '../model/postmodel.php';

$featured_posts = getFeaturedPosts();
$recent_posts = getAllPosts();        
?>