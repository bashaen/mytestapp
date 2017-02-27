<?php
    session_start();
    require "config.php";

if( isset($_SESSION['broadchats_loggedin']) && $_SESSION['broadchats_loggedin'] != ''  && $_SESSION['broadchats_loggedin'] != null) {
    $user_id = $_SESSION['user_id'];

    if($user_id !== "" && $user_id !== null){
        $logged_in = true;
    } else {
        $logged_in = false;
    }
}else{
    $logged_in = false;
    $user_id = "";
}