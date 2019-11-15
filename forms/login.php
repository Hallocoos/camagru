<?php
    
    session_start();
    include "../config/database.php";
    include "./validation.php";
    include "../functions/verifyLoginDetails.php";
    

    $username = $_POST['username'];
    $password = $_POST['password'];
    $_SESSION['login_success'] = NULL;
    $_SESSION['error'] = NULL;

    if (empty($username)) {
        $_SESSION['error'] = "Please insert both a username and a password.";
        header("Location: ../login.php");
    } else if (empty($password)) {
        $_SESSION['error'] = "Please insert both a username and a password.";
        header("Location: ../login.php");
    } else {
        if (verifyLoginDetails($username, $password)) {
            $_SESSION['username'] = $username;
            $_SESSION['password'] = FALSE;
            $_SESSION['login_success'] = TRUE;
            header("Location: ../home_page.php");
        } else {
            $_SESSION['login_success'] = FALSE;
            header("Location: ../login.php");
        }
    }

?>