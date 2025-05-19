<?php

$page = isset($_GET['page']) ? $_GET['page'] : 'admin_post';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="../assets/css/adminpage.css">
</head>
<body>

<header class="header">
    <div class="logo">Blogging</div>
</header>

<div class="container">
    <aside class="sidebar">
        <nav>
            <ul>
             
                <li><a href="adminpage.php?page=admin_post">Posts</a></li>
                <li><a href="adminpage.php?page=admin_users">Users</a></li>
                <li><a href="adminpage.php?page=admin_role">Roles</a></li>
                <li><a href="adminpage.php?page=admin_collections">Collections</a></li>
                <li><a href="adminpage.php?page=logout">logout</a></li>
            </ul>
        </nav>
    </aside>

    <main class="main-content">
        <?php include "{$page}.php"; ?> 
    </main>
</div>

</body>
</html>