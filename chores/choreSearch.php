<?php
    $chore_text = $_POST['choreText'];

    require("../db.php");

    try {
        $results = $db->query("SELECT * FROM chores WHERE title LIKE \"T%\"");
    } catch (Except $e) {
        echo("Could Not Complete User Chore in db");
    }

    $all_chores = $results->fetchAll(PDO::FETCH_ASSOC);
    echo(json_encode($all_chores));