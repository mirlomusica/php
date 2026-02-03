<?php

include_once '../model/Autentication.php';

if (($username = filter_input(INPUT_POST, 'user')) != null and
        ($passwd = filter_input(INPUT_POST, 'passwd')) != null) {
    
    $datauser = checkUser($username, $passwd);
       
    if (count($datauser) != 0) {
        setcookie('user', $username, 0, '/' );
        setcookie('level', $datauser["level"], 0, '/');
        setcookie('points', $datauser["points"], 0, '/');
        setcookie('loginAttempts', 0, 0, '/');

        header('location: ../views/Main.php');
    } else {
        if ((filter_input(INPUT_COOKIE, 'loginAttempts') ) < 5) {
            setcookie('loginAttempts', filter_input(INPUT_COOKIE, 'loginAttempts') + 1, time() + 3600, '/');
        } 
        header('location: ../views/BadLogin.php');
    }
} else {
    header('location: ../views/BadLogin.php');
}

