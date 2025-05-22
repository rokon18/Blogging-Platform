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
    <header>
        <div class="logo">Blogging</div>
        <nav>
            <a href="#">Our story</a>
            <a href="Newsltrsignup.html">Membership</a>
            <a href="../Blogging-Platform/view/login.php">Write</a>
            <div class="notification">
                <span class="bell">&#128276;</span>
                <span class="badge">3</span>
            </div>
            <div class="profile">
                <img src="../assets/img/istockphoto-1053936212-1024x1024.jpg" alt="Profile" class="profile-img">
                <span class="username" onclick="toggleMenu()">
                    <?php
                    if (isset($_SESSION['username'])) {
                        echo $_SESSION['username'];
                    } else {
                        echo 'Profile';
                    }
                    ?>
                </span>
                <div class="dropdown-menu" id="profileMenu">
                    <a href="../view/profile.php">Update Profile</a>
                    <a href="../view/adminpage.php">Admin Page</a>
                    <a href="../controler/logout.php">Logout</a>
                </div>
            </div>
        </nav>
    </header>
    <div class="container">
        <div class="header">
            <h2>Recent Articles</h2>
            <a href="#">See All</a>
        </div>
        <div class="articles">
            <?php
            foreach ($articles as $article) {
                echo '<div class="card">';
                echo '<img src="' . $article['image_url'] . '" alt="Article Image">';
                echo '<div class="card-content">';
                echo '<div class="category">' . $article['category'] . '</div>';
                echo '<h3>' . $article['title'] . '</h3>';
                echo '<p>' . $article['description'] . '</p>';
                echo '</div>';
                echo '<div class="card-footer">';
                echo '<div class="author">';
                echo '<img src="' . $article['author_image'] . '" alt="Author">';
                echo '<span>' . $article['author_name'] . '</span>';
                echo '</div>';
                echo '<a href="">Read more →</a>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
    <script src="../assets/js/dashboard.js"></script>
</body>
</html>


