<?php

function insertUser($username, $password, $email)
{
   
    $con = mysqli_connect('127.0.0.1', 'root', '', 'project');

    
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    
    $sql = "INSERT INTO signup (id, username, password, email) VALUES (null, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sss", $username, $password, $email);
        $result = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    } else {
        $result = false;
    }

    
    mysqli_close($con);

    return $result;
}
?>
