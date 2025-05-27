<?php
include_once '../model/texteditorModel.php';
$title = $content = $description = $category = "";
$titleErr = $contentErr = $descriptionErr = $categoryErr = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Support JSON requests (AJAX)
    if (isset($_SERVER['CONTENT_TYPE']) && strpos($_SERVER['CONTENT_TYPE'], 'application/json') !== false) {
        $input = json_decode(file_get_contents('php://input'), true);
        $_POST = is_array($input) ? $input : [];
    }
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

    if (empty($_POST["description"])) {
        $descriptionErr = "Description is required.";
        $valid = false;
    } else {
        $description = trim($_POST["description"]);
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
        $img = null;
        // Handle image upload if present (for multipart/form-data)
        if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
            $uploadDir = '../assets/img/';
            $imgName = basename($_FILES["image"]["name"]);
            $targetFile = $uploadDir . $imgName;
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                $img = $imgName;
            } else {
                $img = null;
            }
        }
        if (createTextPost($title, $content, $description, $category, $img)) {
            // For AJAX: return plain text response
            echo "✅ Post submitted successfully!";
            exit;
        } else {
            echo "❌ Failed to submit post. Please try again.";
            exit;
        }
    } else {
        // For AJAX: return validation error
        echo "❌ Failed to submit post. Please check your input.";
        exit;
    }
}
?>
