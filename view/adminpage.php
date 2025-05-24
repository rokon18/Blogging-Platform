<?php



$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : 'admin_post';
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

<?php include "../view/header.php"; ?>

<div class="container">
    <aside class="sidebar">
        <nav>
            <ul>
             
                <li><a href="adminpage.php?page=admin_post">Posts</a></li>
                <li><a href="adminpage.php?page=admin_users">Users</a></li>
                <li><a href="adminpage.php?page=admin_role">Roles</a></li>
                <li><a href="adminpage.php?page=admin_collection">Collections</a></li>
                <li><a href="adminpage.php?page=../controler/logout">logout</a></li>
            </ul>
        </nav>
    </aside>

    <main class="main-content">
        <?php include "{$page}.php"; ?> 
    </main>
</div>

</body>
</html>