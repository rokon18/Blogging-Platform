<?php

session_start();

if (!isset($_SESSION['posts'])) {
    $_SESSION['posts'] = array(
        array("author" => "Awa Melvine", "title" => "Defining Moments", "topic" => "Life Experiences", "publish" => "Unpublished"),
        array("author" => "Awa Melvine", "title" => "The Stuff of Cuteness", "topic" => "Jokes & Memes", "publish" => "Unpublished")
    );
}

$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        (isset($_POST['add_feature']) || isset($_POST['delete_post'])) &&
        (!isset($_POST['postSelect']) || count($_POST['postSelect']) == 0)
    ) {
        $error = "Please select at least one post.";
    }
}

$posts = $_SESSION['posts'];
?>