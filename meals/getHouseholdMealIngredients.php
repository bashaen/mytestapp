<?php
    $meal_id = $_GET['meal_id'];
    require("../db.php");

    try {
        $results = $db->prepare("SELECT * FROM `ingredients` WHERE meal_id = ?");
        $results->bindValue(1, $meal_id);
        $results->execute();
    } catch (Exception $e) {
        echo("Could Not Return Ingredients");
    }

    $meals = $results->fetchAll(PDO::FETCH_ASSOC);
    echo(json_encode($meals));