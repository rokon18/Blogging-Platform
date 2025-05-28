<?php
require_once 'db.php';

function getAllPosts() {
    $conn = getDatabaseConnection();
    $sql = "SELECT * FROM posts ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);
    $posts = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $posts[] = $row;
    }
    return $posts;
}

function deletePostById($id) {
    $conn = getDatabaseConnection();
    $sql = "DELETE FROM posts WHERE id = " . intval($id);
    return mysqli_query($conn, $sql);
}

function addFeaturedPost($postId) {
    $conn = getDatabaseConnection();
    // Prevent duplicate featured posts
    $checkSql = "SELECT id FROM featured_posts WHERE post_id = " . intval($postId);
    $checkResult = mysqli_query($conn, $checkSql);
    if (mysqli_num_rows($checkResult) == 0) {
        $sql = "INSERT INTO featured_posts (post_id) VALUES (" . intval($postId) . ")";
        return mysqli_query($conn, $sql);
    }
    return false;
}
?>