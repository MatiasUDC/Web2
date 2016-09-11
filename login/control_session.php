<?php
    //iniciar la session
    session_start();
    //el usuario NO esta logueado?
    if(!array_key_exists('logueado', $_SESSION ) || $_SESSION['logueado'] != true ){
        header('Location: login/login_vista.php');
        die();
    }
    //continuo
    
