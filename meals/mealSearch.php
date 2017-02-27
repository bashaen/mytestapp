<?php
    $meal_text = $_POST['mealText'];
    require("../db.php");

    try {
        $results = $db->query("SELECT * FROM meals WHERE name LIKE \"T%\"");
    } catch (Except $e) {
        echo("Could Not Find Meals in db");
    }

    $all_meals = $results->fetchAll(PDO::FETCH_ASSOC);
    if ( $all_meals ) {
        echo(json_encode($all_meals));
    } else {
        echo "No Meals that meet that criteria";
    }