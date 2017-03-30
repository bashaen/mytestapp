<?php
    $chore_id    = $_POST['choreId'];
    $user_id     = $_POST['userId'];


    require("../db.php");

    try {
        $db->query("UPDATE `chores` SET `user_id`='$user_id', `active`='1' WHERE `chore_id`='$chore_id'");
        echo("Chore Activated");
    } catch (Except $e) {
        echo("Could Not Activate Chore in db");
    }