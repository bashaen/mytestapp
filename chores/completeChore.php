<?php
    $chore_id    = $_POST['choreId'];

    require("../db.php");

    try {
        $db->query("UPDATE `chores` SET `completed`='1' WHERE `chore_id`='$chore_id'");
        echo("Chore Completed");
    } catch (Except $e) {
        echo("Could Not Complete User Chore in db");
    }