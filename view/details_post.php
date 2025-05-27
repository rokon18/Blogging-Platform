<?php


require_once '../controler/dashboard_controller.php';

$post_id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';


$selected_article = null;
foreach ($articles as $article) {
    if ($article['id'] == $post_id) {
        $selected_article = $article;
        break;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Post Details</title>
    <link rel="stylesheet" href="../assets/css/details_post.css">
</head>
<body>
    <?php
    include '../view/header.php';
    ?>
    <div class="container">
        <?php if ($selected_article): ?>
            <div class="post-details">
                <h2><?php echo htmlspecialchars($selected_article['title']); ?></h2>
                <div class="meta">
                    <span><?php echo htmlspecialchars($selected_article['author_name']); ?></span>
                    | <a href="#" id="shareBtn">Share</a>
                    <span id="copyMsg" style="display:none; color:green; margin-left:8px;">Link copied!</span>
                </div>
                <img src="<?php echo htmlspecialchars($selected_article['image_url']); ?>" alt="Post Image" class="post-image">
                <div class="content">
                    <?php
                    if (isset($selected_article['content'])) {
                        echo '<p>' . htmlspecialchars($selected_article['content']) . '</p>';
                    } else {
                        echo '<em>No content available for this post.</em>';
                    }
                    ?>
                </div>
            </div>
        <?php else: ?>
            <div style="color:red;">Post not found.</div>
        <?php endif; ?>
    </div>
    
<script>
document.getElementById('shareBtn').onclick = function(e) {
    
    navigator.clipboard.writeText(window.location.href).then(function() {
        document.getElementById('copyMsg').style.display = 'inline';
        setTimeout(function() {
            document.getElementById('copyMsg').style.display = 'none';
        }, 1500);
    });
};
</script>
</body>
</html>