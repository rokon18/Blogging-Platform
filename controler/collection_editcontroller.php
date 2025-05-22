<?php

session_start();

$error = "";
$collectionTitle = "Unknown Collection";
if (isset($_REQUEST['id'])) {
    $collections = isset($_SESSION['collections']) ? $_SESSION['collections'] : [];
    foreach ($collections as $collection) {
        if ($collection['id'] == $_REQUEST['id']) {
            $collectionTitle = $collection['title'];
            break;
        }
    }
}


$allPosts = [
    "Defining Moments",
    "The Stuff of Cuteness",
    "Tech Trends 2025",
    "Healthy Living",
    "AI Revolution",
    "Travel Diaries"
];


$selectedPosts = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST['selected_posts']) || count($_POST['selected_posts']) == 0) {
        $error = "Please select at least one post.";
    } else {
        $selectedPosts = $_POST['selected_posts'];
    }
}

?>