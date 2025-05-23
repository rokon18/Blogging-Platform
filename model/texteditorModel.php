<?php

include_once "../model/db.php";

function createTextPost($title, $content, $img) {
    $conn = getDatabaseConnection();
    $sql = "INSERT INTO posts (title, content, img) VALUES ('" . mysqli_real_escape_string($conn, $title) . "', '" . mysqli_real_escape_string($conn, $content) . "', '" . mysqli_real_escape_string($conn, $img) . "')";
    return mysqli_query($conn, $sql);
}

function getTextPostById($id) {
    $conn = getDatabaseConnection();
    $sql = "SELECT * FROM posts WHERE id = '" . intval($id) . "'";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result);
}

function updateTextPost($id, $title, $content, $img) {
    $conn = getDatabaseConnection();
    $sql = "UPDATE posts SET title = '" . mysqli_real_escape_string($conn, $title) . "', content = '" . mysqli_real_escape_string($conn, $content) . "', img = '" . mysqli_real_escape_string($conn, $img) . "' WHERE id = '" . intval($id) . "'";
    return mysqli_query($conn, $sql);
}

function deleteTextPost($id) {
    $conn = getDatabaseConnection();
    $sql = "DELETE FROM posts WHERE id = '" . intval($id) . "'";
    return mysqli_query($conn, $sql);
}

function getAllTextPosts() {
    $conn = getDatabaseConnection();
    $sql = "SELECT * FROM posts ORDER BY created_at";
    $result = mysqli_query($conn, $sql);
    $posts = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $posts[] = $row;
    }
    return $posts;
}

function login($username, $password) {
    $conn = getDatabaseConnection();
    $sql_stmt = "SELECT * FROM users WHERE username='" . mysqli_real_escape_string($conn, $username) . "' AND password='" . mysqli_real_escape_string($conn, $password) . "'";
    $result = mysqli_query($conn, $sql_stmt);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        return true;
    }
    return false;
}