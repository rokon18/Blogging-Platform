<?php
include_once '../model/texteditorModel.php';
$title = $content = $category = "";
$titleErr = $contentErr = $categoryErr = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $valid = true;

    if (empty($_POST["title"])) {
        $titleErr = "Title is required.";
        $valid = false;
    } else {
        $title = trim($_POST["title"]);
        if (strlen($title) < 3) {
            $titleErr = "Title must be at least 3 characters.";
            $valid = false;
        }
    }

    if (empty($_POST["content"])) {
        $contentErr = "Content is required.";
        $valid = false;
    } else {
        $content = trim($_POST["content"]);
    }

    if (empty($_POST["category"])) {
        $categoryErr = "Category is required.";
        $valid = false;
    } else {
        $category = $_POST["category"];
    }

    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $allowedTypes = ["image/jpeg", "image/png", "image/gif"];
        $fileType = mime_content_type($_FILES["image"]["tmp_name"]);
        if (!in_array($fileType, $allowedTypes)) {
            $success = "Invalid image type. Only JPG, PNG, and GIF are allowed.";
            $valid = false;
        }
    }

    if ($valid) {
        // Insert post into database
        if (createTextPost($title, $content, $category)) {
            $success = "✅ Post submitted successfully!";
            $title = $content = $category = "";
        } else {
            $success = "❌ Failed to submit post. Please try again.";
        }
    }
}
?>
