<?php
    $chore_id    = $_POST['choreId'];

    require("../db.php");

    try {
        $db->query("UPDATE `chores` SET `completed`='0' WHERE `chore_id`='$chore_id'");
        echo("Chore Incomplete");
    } catch (Except $e) {
        echo("Could Not Incomplete User Chore in db");
    }