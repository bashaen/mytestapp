<?php
    // FIXME need to add some sort of validation here, both for if user, if correct household, and if all elements exist. (name, etc.)
    $meal_id = $_POST['mealId'];
    $date = $_POST['date'];
    $name = $_POST['name'];
    $description = $_POST['description'];

    require("../db.php");

    try {
        $db->query("UPDATE `meals` SET `date`='$date', `name`='$name', `description`='$description' WHERE `meal_id`='$meal_id'");
        echo("meal updated");
    } catch (Except $e) {
        echo("Could Not update Meal in db");
    }