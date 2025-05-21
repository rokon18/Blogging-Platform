<?php
    session_start();
    if(isset($_SESSION['status'])){
?>
<?php

$articles = [
    [
        'id' => 1,
        'image_url' => '../assets/img/istockphoto-1053936212-1024x1024.jpg',
        'category' => 'Jokes & Memes',
        'title' => 'The Stuff of Cuteness',
        'description' => 'These are some very cute animals. These are some very cute animals. These are some very cute animals.',
        'author_name' => 'Awa Melvine',
        'author_image' => '../assets/img/istockphoto-1053936212-1024x1024.jpg'
    ],
    [
        'id' => 2,
        'image_url' => '../assets/img/istockphoto-1053936212-1024x1024.jpg',
        'category' => 'Life Lessons',
        'title' => 'A Life Lesson from Learning to Swim',
        'description' => 'I went swimming today or rather I went to the pool and played in the water...',
        'author_name' => 'Awa',
        'author_image' => '../assets/img/istockphoto-1053936212-1024x1024.jpg'
    ],
    [
        'id' => 3,
        'image_url' => '../assets/img/istockphoto-1053936212-1024x1024.jpg',
        'category' => 'Entrepreneurship',
        'title' => 'On Writing and Life Experiences',
        'description' => '10:00 pm. Sunday night. I am lying on my back, my head propped up on a pillow...',
        'author_name' => 'Awa Melvine',
        'author_image' => '../assets/img/istockphoto-1053936212-1024x1024.jpg'
    ],
       [
        'id' => 1,
        'image_url' => '../assets/img/istockphoto-1053936212-1024x1024.jpg',
        'category' => 'Jokes & Memes',
        'title' => 'The Stuff of Cuteness',
        'description' => 'These are some very cute animals. These are some very cute animals. These are some very cute animals.',
        'author_name' => 'Awa Melvine',
        'author_image' => '../assets/img/istockphoto-1053936212-1024x1024.jpg'
    ],
];
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
            <span class="username" onclick="toggleMenu()">Admin </span>
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
            foreach ($articles as $article) { ?>
                <div class="card">
                    <img src="<?= $article['image_url'] ?>" alt="Article Image">
                    <div class="card-content">
                        <div class="category"><?= $article['category'] ?></div>
                        <h3><?= $article['title'] ?></h3>
                        <p><?= $article['description'] ?></p>
                    </div>
                    <div class="card-footer">
                        <div class="author">
                            <img src="<?= $article['author_image'] ?>" alt="Author">
                            <span><?= $article['author_name'] ?></span>
                        </div>
                        <a href="">Read more →</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <script src="../assets/js/dashboard.js"></script>
</body>
</html>


 
<?php
    }else{
        header('location: login.php');
    }

?>