<?php
    session_start();
   require_once('../model/userModel.php');
?>
<?php
        
if (isset($_POST['submit'])) {
    $name = trim($_POST['username']);
    $password = trim($_POST['password']);

    if ($name == "" && $password=="") {
        echo "Name or password cannot be empty!";
    } else if (strlen($name) < 2) {
        echo "Name must contain at least two characters!";
    } else if (!ctype_alpha($name[0])) {
        echo "Name must start with a letter!";
    }  else if (strlen($password) <6) {
        echo "password must contain at least six characters!";
    } 
     else {
        for ($i = 0; $i < strlen($name); $i++) {
            $char = $name[$i];
            if (!ctype_alpha($char) && $char !== '.' && $char !== '-' && $char !== ' ') {
                echo "Name can only contain letters, dots (.), dashes (-), and spaces!";
                break;
            }
            
        }  $user = [
        'username' => $name,
        'password' => $password
    ];
    if (login($user)) {
        $_SESSION['status'] = true;
        $_SESSION['username'] = $name;
        header("Location: ../view/dashboard.php");
        exit();
    } else {
       $_SESSION['login_error']= "Invalid username or password!";
       header("Location: ../view/login.php");
       exit();
    }
        
          
        
    }

} else {
    echo "Invalid request! Please submit the form!";
}

?>