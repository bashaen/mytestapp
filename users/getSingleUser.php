<?php
    require("../check-session.php");
    require("../db.php");
    $user_id = $_GET['user_id'];

    try {
        $results = $db->prepare("SELECT * FROM `users` WHERE user_id = ?");
        $results->bindValue(1, $user_id);
        $results->execute();
    } catch (Exception $e) {
        echo("Could Not Return User");
        exit;
    }

    $single_user = $results->fetch(PDO::FETCH_ASSOC);
    echo(json_encode($single_user));