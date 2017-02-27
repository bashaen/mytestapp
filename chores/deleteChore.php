<?php
    $chore_id = $_POST['choreId'];

    require("../db.php");

    try {
        $db->query("DELETE FROM `chores` WHERE `chore_id`='$chore_id'");
        echo("Chore Deleted");

    } catch (Except $e) {
        echo("Could Not delete Chore in db");
    }