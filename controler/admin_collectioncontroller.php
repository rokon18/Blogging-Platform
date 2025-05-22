<?php
session_start();


if (!isset($_SESSION['collections'])) {
    $_SESSION['collections'] = [
        ["id" => 1, "title" => "Best of 2025", "post_count" => 10],
        ["id" => 2, "title" => "Featured Post", "post_count" => 7],
        ["id" => 3, "title" => "Recent", "post_count" => 5]
    ];
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_collection'])) {
    $new_title = trim($_POST['collection_title']);
    if ($new_title === "") {
        $error = "Collection title cannot be empty.";
    } else {
        $collections = $_SESSION['collections'];
        $is_unique = true;
        foreach ($collections as $collection) {
            if (strtolower($collection['title']) == strtolower($new_title)) {
                $is_unique = false;
                break;
            }
        }
        if ($is_unique) {
            if (count($collections) > 0) {
                $last = end($collections);
                $new_id = $last['id'] + 1;
            } else {
                $new_id = 1;
            }
            $collections[] = array("id" => $new_id, "title" => $new_title, "post_count" => 0);
            $_SESSION['collections'] = $collections;
        } else {
            $error = "Collection title must be unique.";
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_collection'])) {
    $delete_id = intval($_POST['delete_id']);
    $collections = $_SESSION['collections'];
    foreach ($collections as $key => $collection) {
        if ($collection['id'] == $delete_id) {
            unset($collections[$key]);
            break;
        }
    }

    $_SESSION['collections'] = array_values($collections);
}

$collections = $_SESSION['collections'];
?>