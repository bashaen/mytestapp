<?php
    $chore_id    = $_POST['choreId'];
    $user_id     = $_POST['userId'];
    $title       = $_POST['title'];
    $description = $_POST['description'];
    $active      = $_POST['active'];
    $completed   = $_POST['completed'];

    require("../db.php");

    try {
        $db->query("UPDATE `chores` SET `user_id`='$user_id', `title`='$title', `description`='$description', `active`='$active', `completed`='$completed' WHERE `chore_id`='$chore_id'");
        echo("Chore Updated");
    } catch (Except $e) {
        echo("Could Not update Chore in db");
    }