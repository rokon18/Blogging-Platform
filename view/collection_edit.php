<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Collection</title>
    <link rel="stylesheet" href="../assets/css/collection_edit.css">
</head>
<body>
<?php 
include '../view/header.php'; 
require_once '../controler/collection_editcontroller.php';
?>
    <h1>Edit Collection</h1>

<div class="container">
    <div class="posts-section">
        <?php if (!empty($error)) { ?>
    <div class="error" style="color:red;margin-bottom:10px;"><?php echo $error; ?></div>
<?php } ?>
        <h2>All Posts</h2>
        <form method="POST" action="collection_edit.php<?php echo isset($_GET['id']) ? '?id=' . $_GET['id'] : ''; ?>">
            <ul>
                <?php
                foreach ($allPosts as $post) {
                    $checked = in_array($post, $selectedPosts) ? "checked" : "";
                    echo "<li><input type='checkbox' name='selected_posts[]' value='$post' $checked> $post</li>";
                }
                ?>
            </ul>
            <button type="submit" class="save-btn">Save Selected Posts</button>
        </form>
    </div>

    <div class="collection-section">
        <h2>Collection: <?php echo $collectionTitle; ?></h2>
        <ul>
            <?php
            if (!empty($selectedPosts)) {
                foreach ($selectedPosts as $selectedPost) {
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