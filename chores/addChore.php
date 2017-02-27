<?php
    $home_id     = $_POST['homeId'];
    $user_id     = $_POST['userId'];
    $chore_id    = $_POST['choreId'];
    $notes       = $_POST['notes'];
    $active      = $_POST['active'];
    $completed   = $_POST['completed'];

    require("../db.php");

    try {
        $db->query("INSERT INTO `chores_users`(`home_id`, `user_id`, `notes`, `active`, `completed`, `chore_id`) VALUES ('$home_id', '1', '$notes', '$active', '$completed', '$chore_id');");
        echo("Chore Added");
    } catch (Except $e) {
        echo("Could Not add Chore to db");
    }