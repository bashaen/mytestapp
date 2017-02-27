<?php
    // FIXME need to add some sort of validation here, both for if user, if correct household, and if all elements exist. (name, etc.)
    $home_id = $_POST['homeId'];
    $date = $_POST['date'];
    $name = $_POST['name'];
    $description = $_POST['description'];

    require("../db.php");

    try {
        $db->query("INSERT INTO `meals`(`meal_id`, `home_id`, `date`, `name`, `description`) VALUES (NULL, '$home_id', '$date', '$name', '$description');");
        echo("Success");
    } catch (Except $e) {
        echo("Could Not add Meal to db");
    }