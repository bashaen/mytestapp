<?php
    // FIXME need to add some sort of validation here, both for if user, if correct household, and if all elements exist. (name, etc.)
    $meal_id   = $_POST['mealId'];

    // FIXME Make sure that all can be deleted before removing the others.
    // If cannot, add the ingredients back.  ( Or possibly not delete them at all )
    // 1. Do this for all multi queries, especially deletes.
    // 2. http://php.net/manual/en/mysqli.begin-transaction.php - this is what you can use to do so.
    require("../db.php");

    try {
        $db->query("DELETE FROM `meals` WHERE `meal_id`='$meal_id'");
        echo('Deleted Meal where meal id');
        try {
            $db->query("DELETE FROM `ingredients` WHERE `meal_id`='$meal_id'");
            echo('Deleted ingredients where meal id');
            try {
                $db->query("DELETE FROM `meal_ingredients` WHERE `meal_id`='$meal_id'");
                echo('Deleted meal ingredients where meal id');
            } catch (Except $e) {
                echo("Could not delete meal and ingredient combo");
            }
        } catch (Except $e) {
            echo("Could not delete ingredients");
        }
    } catch (Except $e) {
        echo("Could Not delete Meal in db");
    }