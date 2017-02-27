<?php
    header('Access-Control-Allow-Origin: *');
    require("../check-session.php");
    require("../db.php");

    try {
        $results = $db->query("
          SELECT
              chore_id,
              title,
              location
          FROM chores");
    } catch (Exception $e) {
        echo("Could not get Chores List");
        exit;
    }

    $all_chores = $results->fetchAll(PDO::FETCH_ASSOC);
    echo(json_encode($all_chores));