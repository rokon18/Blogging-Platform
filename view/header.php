<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
      <link rel="stylesheet" href="../assets/css/dashboard.css">
<script src="../assets/js/dashboard.js"></script>
    <header>
    <div class="logo">Blogging</div>
    
    <nav>
        <a href="#">Our story</a>
        <a href="Newsltrsignup.html">Membership</a>
        <a href="../Blogging-Platform/view/login.php">Write</a>
        
       
        <div class="notification">
            <span class="bell">&#128276;</span>
            <span class="badge">3</span>
        </div>

     
        <div class="profile">
            <img src="../assets/img/istockphoto-1053936212-1024x1024.jpg" alt="Profile" class="profile-img">
             <span class="username" onclick="toggleMenu()">
                    <?php
                    if (isset($_SESSION['username'])) {
                        echo $_SESSION['username'];
                    } else {
                        echo 'Profile';
                    }
                    ?>
                </span>
            <div class="dropdown-menu" id="profileMenu">
                <a href="../view/profile.php">Update Profile</a>
                <a href="../view/adminpage.php">Admin Page</a>
                <a href="../controler/logout.php">Logout</a>
            </div>
        </div>
    </nav>
</header>
</body>
</html>
   
  
