<?php
    $chore_id = $_POST['choreId'];

    require("../db.php");

    try {
        $db->query("UPDATE `chores` SET `user_id`='0' WHERE `chore_id`='$chore_id'");
        echo("Chore Unassigned");
    } catch (Except $e) {
        echo("Could Not Un Assign User Chore in db");
    }