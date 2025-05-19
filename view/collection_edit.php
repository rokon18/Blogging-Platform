<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="../assets/css/collection_edit.css">
</head>
<body>
    <h1>Edit Collection</h1>

<div class="container">
   
    <div class="posts-section">
        <h2>All Posts</h2>
        <form method="POST" action="collection_edit.php">
            <ul>
                <?php
                
                $allPosts = [
                    "Defining Moments",
                    "The Stuff of Cuteness",
                    "Tech Trends 2025",
                    "Healthy Living",
                    "AI Revolution",
                    "Travel Diaries"
                ];
                
                foreach ($allPosts as $post) {
                    echo "<li><input type='checkbox' name='selected_posts[]' value='$post'> $post</li>";
                }
                ?>
            </ul>
            <button type="submit" class="save-btn">Save Selected Posts</button>
        </form>
    </div>


    <div class="collection-section">
        <h2>Collection: Best of 2025</h2>
        <ul>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['selected_posts'])) {
                foreach ($_POST['selected_posts'] as $selectedPost) {
                    echo "<li>$selectedPost</li>";
                }
            } else {
                echo "<li>No posts selected yet</li>";
            }
            ?>
        </ul>
    </div>
</div>
</body>
</html>