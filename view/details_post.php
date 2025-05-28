<?php

require_once '../controler/dashboard_controller.php';
require_once '../model/postmodel.php';

$post_id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';

$selected_post = null;

// Search in featured posts first
foreach ($featured_posts as $post) {
    if ($post['id'] == $post_id) {
        $selected_post = $post;
        break;
    }
}

// If not found in featured, search in recent posts
if (!$selected_post) {
    foreach ($recent_posts as $post) {
        if ($post['id'] == $post_id) {
            $selected_post = $post;
            break;
        }
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
    <?php include '../view/header.php'; ?>
    <div class="container">
        <?php if ($selected_post): ?>
            <div class="post-details">
                <h2><?php echo htmlspecialchars($selected_post['title']); ?></h2>
                <div class="meta">
                    <span><?php echo htmlspecialchars($selected_post['author_name']); ?></span>
                    | <a href="#" id="shareBtn">Share</a>
                    <span id="copyMsg" style="display:none; color:green; margin-left:8px;">Link copied!</span>
                </div>
                <div class="image">
                    <?php
                    echo '<img src="../assets/img/' . htmlspecialchars($selected_post['img']) . '" alt="Article Image">';
                    ?>
                </div>
                <div class="content">
                    <?php
                    if (isset($selected_post['content'])) {
                        echo '<p>' . htmlspecialchars($selected_post['content']) . '</p>';
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