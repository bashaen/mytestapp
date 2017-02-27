<?php
    require("../check-session.php");
    require("../db.php");
    $home_id = $_GET['home_id'];
    $meals_with_ingredients = [];

    try {
        $results = $db->prepare("SELECT * FROM `meals` WHERE home_id = ?");
        $results->bindValue(1, $home_id);
        $results->execute();
    } catch (Exception $e) {
        echo("Could Not Return Meals");
        exit;
    }

    $meals = $results->fetchAll(PDO::FETCH_ASSOC);
    echo(json_encode($meals));
//
//    $meals = $results->fetchAll(PDO::FETCH_ASSOC);
//    foreach ( $meals as $meal ) {
//        try {
//            $meal_id = $meal["meal_id"];
//
//            $results = $db->query("
//                SELECT
//                  meal_ingredients.amount as amount_needed,
//                  ingredient.name as ingredient_name,
//                  ingredient.brand as ingredient_brand,
//                  ingredient.description ingredient_description,
//                  ingredient.amount as amount_owned,
//                  ingredient.own as currently_have,
//                  meals.name as meal_name,
//                  meals.description as meal_description,
//                  meals.date as preparation_date
//                FROM ingredients
//                  INNER JOIN bill_user
//                    ON users.user_id = bill_user.user_id
//                    WHERE bill_user.bill_id = $meal_id;");
//
//            $ingredient_info = $results->fetchAll(PDO::FETCH_ASSOC);
//            $bill_with_users[$bill_id]["bill_info"] = $bill;
//            $bill_with_users[$bill_id]["bill_users"] = $bill_info;
//        } catch (Exception $e) {
//            echo("Could Not Return Meals");
//            exit;
//        }
//    }