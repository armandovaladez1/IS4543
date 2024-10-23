<?php
    session_start();

    include("config.php");
    include("functions.php");

    $user_data = check_login($con);

    if($user_data['user_type']== 'admin'){
        header('Location: adminPanel.php');
        die();
    }else{
        header('Location: userPage.php');
        die();
    }