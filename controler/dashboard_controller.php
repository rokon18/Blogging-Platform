<?php

session_start();

if (!isset($_SESSION['status'])) {
    header('Location: login.php');
    exit;
}


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
 
];
?>