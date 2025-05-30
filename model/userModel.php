<?php
   
    require_once('db.php');

    function login($user){
        $con = getDatabaseConnection();
        $sql = "select * from users where username='{$user['username']}' and password='{$user['password']}'";
        $result = mysqli_query($con, $sql);
        $count = mysqli_num_rows($result);

        if($count == 1){
            return true;
        }else{
            return false;
        }
    }
    
    function signup($user) {
        $con = getDatabaseConnection();
        $username = mysqli_real_escape_string($con, $user['username']);
        $password = mysqli_real_escape_string($con, $user['password']);
        $email = mysqli_real_escape_string($con, $user['email']);

        $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
        $result = mysqli_query($con, $sql);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    function updateProfilePic($username, $file) {
        $con = getDatabaseConnection();
        $currentUsernameEscaped = mysqli_real_escape_string($con, $username);

        if ($file['error'] === UPLOAD_ERR_OK) {
            $imgName = $file['name'];
            $imgTmp = $file['tmp_name'];
            $imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
            $allowed = ['jpg', 'jpeg', 'png', 'gif'];

            if (in_array($imgExt, $allowed)) {
                $newImgName = uniqid('profile_', true) . '.' . $imgExt;
                if (move_uploaded_file($imgTmp, "../assets/img/" . $newImgName)) {
                    $sql = "UPDATE users SET profile_pic='$newImgName' WHERE username='$currentUsernameEscaped'";
                    return mysqli_query($con, $sql);
                }
            }
        }
        return false;
    }

    function getAllUsers() {
        $con = getDatabaseConnection();
        $sql = "SELECT id, username, email, role FROM users";
        $result = mysqli_query($con, $sql);
        $users = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $users[] = $row;
        }
        return $users;
    }

    function updateUserRole($id, $role) {
        $con = getDatabaseConnection();
        $id = intval($id);
        $role = mysqli_real_escape_string($con, $role);
        $sql = "UPDATE users SET role='$role' WHERE id=$id";
        return mysqli_query($con, $sql);
    }

    function deleteUser($id) {
        $con = getDatabaseConnection();
        $id = intval($id);
        $sql = "DELETE FROM users WHERE id = $id";
        return mysqli_query($con, $sql);
    }

?>