<?php
    session_start();
    if(isset($_POST['action']) && !empty($_POST['action'])) {
        $action = $_POST['action'];
        switch($action) {
            case 'login':
                $email = $_POST['email'];
                $password = $_POST['password'];
                authenticateUser($email, $password);
                break;
        }
    }

    function authenticateUser($email, $password){
        require("../db.php");

        try {
            $a = $db->prepare("SELECT COUNT(*) FROM `users` WHERE email = ? AND password = ?");
            $a->bindValue(1, $email);
            $a->bindValue(2, $password);
            $a->execute();
        } catch (Exception $e) {
            echo("No User exists with this information");
            exit;
        }

        try {
            $b = $db->prepare("SELECT * FROM `users` WHERE email = ?");
            $b->bindValue(1, $email);
            $b->execute();
        } catch (Exception $e) {
            echo("No User exists with this information");
            exit;
        }

        $user_count = $a->fetch(PDO::FETCH_ASSOC);
        $user_info  = $b->fetch(PDO::FETCH_ASSOC);
        $user_count = intval($user_count["COUNT(*)"]);

        if($user_count > 0){
            $_SESSION['broadchats_loggedin'] = "1";
            $_SESSION['user_id']             = $user_info['user_id'];
            $_SESSION['firstName']           = $user_info['firstName'];
            $_SESSION['lastName']            = $user_info['lastName'];
            $_SESSION['email']               = $user_info['email'];
            $_SESSION['birthday']            = $user_info['birthday'];
            $_SESSION['role']                = $user_info['role'];
            $_SESSION['color']               = $user_info['color'];

            $return_user = Array("response" => "success", "logged_in" => "true", "user_id" => $user_info['user_id'], "user_info" => $user_info);
            echo(json_encode($return_user));
        }else{
            $_SESSION['broadchats_loggedin'] = "0";
            $_SESSION['user_id']             = "";
            $_SESSION['firstName']           = "";
            $_SESSION['lastName']            = "";
            $_SESSION['email']               = "";
            $_SESSION['birthday']            = "";
            $_SESSION['role']                = "";
            $_SESSION['color']               = "";

            $return_user = Array("response" => "fail", "logged_in" => "false", "user_id" => "");
            echo(json_encode($return_user));
        }
    }