<?php
    $chore_id    = $_POST['choreId'];

    require("../db.php");

    try {
        $db->query("UPDATE `chores` SET `active`='0' WHERE `chore_id`='$chore_id'");
        echo("Chore Deactivated");
    } catch (Except $e) {
        echo("Could Not Deactivate Chore in db");
    }