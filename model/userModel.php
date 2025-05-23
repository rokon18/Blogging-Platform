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

    // function getUserById($id){

    // }

    // function addUser($user){

    // }

    // function deleteUser($id){

    // }

?>