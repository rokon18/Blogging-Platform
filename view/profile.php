<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
     <link rel="stylesheet"  href="../assets/css/profile.css">
      <script src="../assets/js/profile.js"></script>
    </script>
</head>
<body>
<?php
    session_start();
    if (!isset($_SESSION['status']) || $_SESSION['status'] !== true) {
        header("Location: ../view/login.php");
        exit();
    }
   include('../view/header.php');
   $profileImg = "../assets/img/istockphoto-1053936212-1024x1024.jpg"; 
$con = getDatabaseConnection();
$username = mysqli_real_escape_string($con, $_SESSION['username']);
$sql = "SELECT profile_pic FROM users WHERE username='$username'";
$result = mysqli_query($con, $sql);
if ($row = mysqli_fetch_assoc($result)) {
    if (!empty($row['profile_pic'])) {
        $profileImg = "../assets/img/" . $row['profile_pic'];
    }
}
$profileMsg = "";
if (isset($_SESSION['profile_msg'])) {
    $profileMsg = $_SESSION['profile_msg'];
    unset($_SESSION['profile_msg']);
}
?>
    <div class="container">
        <h3>Edit Profile</h3>
        <?php if (!empty($profileMsg)): ?>
            <div class="profile-message"><?php echo $profileMsg; ?></div>
        <?php endif; ?>

        <form onsubmit="return validateForm()" method="post" action="../controler/profilecheck.php" enctype="multipart/form-data">
            <div class="profile-pic">
                <img src="<?php echo $profileImg; ?>" alt="Profile Picture" id="profilePicPreview">
                <input type="file" name="profile_pic" id="profile_pic" accept="image/*">
               
            </div>

            <div>
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username">
            </div>

            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email">
            </div>

            <div>
                <label for="old-password">Old Password</label>
                <input type="password" id="old-password" name="old-password" placeholder="Enter your old password">
            </div>

            <div>
                <label for="new-password">New Password</label>
                <input type="password" id="new-password" name="new-password" placeholder="Enter your new password">
            </div>

            <div>
                <label for="confirm-password">Confirm Password</label>
                <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm your new password">
            </div>
            <div id="msg" class="error-message"><?php echo $profileMsg; ?></div>
            <button type="submit">Save Changes</button>
        </form>

    
    </div>
</body>
</html>
