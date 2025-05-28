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
        <!-- Featured Posts Section -->
        <?php if (!empty($featured_posts)) { ?>
            <div class="header">
                <h2>Featured Posts</h2>
            </div>
            <div class="articles">
                <?php
                foreach ($featured_posts as $post) {
                    echo '<div class="card">';
                    echo '<img src="../assets/img/' . htmlspecialchars($post['img']) . '" alt="Post Image">';
                    echo '<div class="card-content">';
                    echo '<div class="category">' . htmlspecialchars($post['category']) . '</div>';
                    echo '<h3>' . htmlspecialchars($post['title']) . '</h3>';
                    echo '<p>' . htmlspecialchars($post['description']) . '</p>';
                    echo '</div>';
                    echo '<div class="card-footer">';
                    echo '<div class="author">';
                    echo '<img src="' . htmlspecialchars($post['author_image']) . '" alt="Author">';
                    echo '<span>' . htmlspecialchars($post['author_name']) . '</span>';
                    echo '</div>';
                    echo '<a href="details_post.php?id=' . $post['id'] . '">Read more →</a>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>
            </div>
        <?php } ?>

        <!-- Recent Posts Section -->
        <div class="header">
            <h2>Recent Posts</h2>
            <a href="#">See All</a>
        </div>
        <div class="articles">
            <?php
            foreach ($recent_posts as $post) {
                echo '<div class="card">';
                echo '<img src="../assets/img/' . htmlspecialchars($post['img']) . '" alt="Post Image">';
                echo '<div class="card-content">';
                echo '<div class="category">' . htmlspecialchars($post['category']) . '</div>';
                echo '<h3>' . htmlspecialchars($post['title']) . '</h3>';
                echo '<p>' . htmlspecialchars($post['description']) . '</p>';
                echo '</div>';
                echo '<div class="card-footer">';
                echo '<div class="author">';
                echo '<img src="' . htmlspecialchars($post['author_image']) . '" alt="Author">';
                echo '<span>' . htmlspecialchars($post['author_name']) . '</span>';
                echo '</div>';
                echo '<a href="details_post.php?id=' . $post['id'] . '">Read more →</a>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
    <script src="../assets/js/dashboard.js"></script>
</body>
</html>


