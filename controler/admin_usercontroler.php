<?php



if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = [
        ["id" => 1, "username" => "admin", "email" => "admin@example.com", "role" => "Admin"],
        ["id" => 2, "username" => "john_doe", "email" => "john@example.com", "role" => "user"],
        ["id" => 3, "username" => "jane_smith", "email" => "jane@example.com", "role" => "Subscriber"]
    ];
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_id'])) {
    $users = $_SESSION['users'];
    foreach ($users as $index => $user) {
        if ($user['id'] == $_POST['delete_id']) {
            unset($users[$index]);
            break;
        }
    }
    $_SESSION['users'] = array_values($users); 
}

$users = $_SESSION['users'];
?>