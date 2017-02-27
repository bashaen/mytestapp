<?php
    $chore_id    = $_POST['choreId'];
    $user_id     = $_POST['userId'];

    require("../db.php");

    try {
        $db->query("UPDATE `chores` SET `user_id`='$user_id' WHERE `chore_id`='$chore_id'");
        echo("Chore Assigned");
    } catch (Except $e) {
        echo("Could Not Assign User Chore in db");
    }