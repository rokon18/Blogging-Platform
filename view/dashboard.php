<?php
require_once '../controler/dashboard_controller.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
    <link rel="stylesheet" href="../assets/css/dashboard.css">
</head>
<body>
    <?php include '../view/header.php'; ?>
    <div class="container">
        <div class="header">
            <h2>Recent Articles</h2>
            <a href="#">See All</a>
        </div>
        <div class="articles">
            <?php
            foreach ($articles as $article) {
                echo '<div class="card">';
                echo '<img src="../assets/img/' . htmlspecialchars($article['img']) . '" alt="Article Image">';
                echo '<div class="card-content">';
                echo '<div class="category">' . htmlspecialchars($article['category']) . '</div>';
                echo '<h3>' . htmlspecialchars($article['title']) . '</h3>';
                echo '<p>' . htmlspecialchars($article['description']) . '</p>';
                echo '</div>';
                echo '<div class="card-footer">';
                echo '<div class="author">';
                echo '<img src="' . htmlspecialchars($article['author_image']) . '" alt="Author">';
                echo '<span>' . htmlspecialchars($article['author_name']) . '</span>';
                echo '</div>';
                echo '<a href="details_post.php?id=' . $article['id'] . '">Read more →</a>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
    <script src="../assets/js/dashboard.js"></script>
</body>
</html>


