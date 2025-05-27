<?php



if (!isset($_SESSION['status']) || $_SESSION['status'] !== true) {
    header("Location: ../view/login.php");
    exit();
}

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



if (isset($_POST['delete_post']) && isset($_POST['postSelect']) && count($_POST['postSelect']) > 0) {
    $selectedIndexes = $_POST['postSelect'];
    $posts = $_SESSION['posts'];
    
    rsort($selectedIndexes);
    foreach ($selectedIndexes as $index) {
        unset($posts[$index]);
    }
    $_SESSION['posts'] = array_values($posts); 
}
$posts = $_SESSION['posts'];
?>