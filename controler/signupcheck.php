<?php
session_start();

?>
<?php
if (isset($_POST['submit'])) {
    $name = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirmPassword = trim($_POST['confirm_password']);

    if ($name == "" || $email == "" || $password == "" || $confirmPassword == "") {
        echo "Fields cannot be empty!";
    } elseif (strlen($name) < 2) {
        echo "Name must contain at least two characters!";
    } elseif (!ctype_alpha($name[0])) {
        echo "Name must start with a letter!";
    } else {
        for ($i = 0; $i < strlen($name); $i++) {
            $char = $name[$i];
            if (!ctype_alpha($char) && $char !== '.' && $char !== '-' && $char !== ' ') {
                echo "Name can only contain letters, dots (.), dashes (-), and spaces!";
                exit();
            }
        }
    }

    if (strpos($email, "@") === false || strpos($email, ".") === false) {
        echo "Email must contain '@' and '.'!";
    } elseif (strpos($email, "@") > strrpos($email, ".")) {
        echo "'@' must appear before '.' in email!";
    }

  
    if (strlen($password) < 6) {
        echo "Password must contain at least six characters!";
    } elseif ($confirmPassword !== $password) {
        echo "Passwords do not match!";
    } else {
        $_SESSION['status'] = true;
        header("Location: ../view/login.php");
        exit();
    }
} else {
    echo "Invalid request! Please submit the form!";
}
?>
 