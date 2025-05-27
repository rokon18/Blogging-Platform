<?php
require_once '../model/postmodel.php';



if (!isset($_SESSION['status']) || $_SESSION['status'] !== true) {
    header("Location: ../view/login.php");
    exit();
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        (isset($_POST['add_feature']) || isset($_POST['delete_post'])) &&
        (!isset($_POST['postSelect']) || count($_POST['postSelect']) == 0)
    ) {
        $error = "Please select at least one post.";
    }

 
    if (isset($_POST['delete_post']) && isset($_POST['postSelect']) && count($_POST['postSelect']) > 0) {
        foreach ($_POST['postSelect'] as $postId) {
            deletePostById($postId);
        }
    }
}


$posts = getAllPosts();
?>