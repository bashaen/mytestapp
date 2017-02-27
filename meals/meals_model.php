<?php

//function updateIngredients ($meal_id, $date, $name, $description) {
//    require("../db.php");
//
//    try {
//        $db->query("UPDATE `supplies` SET `name`='$name', `amount`='10', `brand`='$brand' WHERE `supply_id`='$supply_id'");
//    } catch (Except $e) {
//        echo("Could Not update Meal in db");
//    }
//}


//function getIngredientInfo($ingredient_id){
//    require("../db.php");
//
//    try {
//        $results = $db->prepare("SELECT * FROM `meals` WHERE home_id = ?");
//        $results->bindValue(1, $ingredient_id);
//        $results->execute();
//    } catch (Exception $e) {
//        echo("Could Not Return Meals");
//        exit;
//    }
//
//    $meals = $results->fetchAll(PDO::FETCH_ASSOC);
//    return $meals;
//}

//function getHouseholdMealIngredients($meal_id){
//    require("../db.php");
//
//    try {
//        $results = $db->query("
//        SELECT
//	      meal_ingredients.amount as amount_needed,
//	      meal_ingredients.own as need_to_buy,
//	      ingredients.name as name,
//          ingredients.brand as brand,
//          ingredients.description as description
//        FROM meal_ingredients
//	      INNER JOIN ingredients
//		    ON meal_ingredients.meal_id = $meal_id");
//    } catch (Exception $e){
//        echo("Could not get Ingredients");
//        exit;
//    }
//
//    $ingredients = $results->fetch(PDO::FETCH_ASSOC);
//    return $ingredients;
//}
//
//function getIngredientInfo($ingredient_id){
//    require("../db.php");
//
//    try {
//        $results = $db->query("
//        SELECT
//	      meal_ingredients.amount as amount_needed,
//	      meal_ingredients.own as need_to_buy,
//	      ingredients.name as name,
//          ingredients.brand as brand,
//          ingredients.description as description
//        FROM meal_ingredients
//	      INNER JOIN ingredients
//		    ON meal_ingredients.meal_id = $ingredient_id");
//    } catch (Exception $e){
//        echo("Could not get Ingredients");
//        exit;
//    }
//
//    $ingredients = $results->fetch(PDO::FETCH_ASSOC);
//    return $ingredients;
//}

// Possible functions to match up the user bills with the user amount paid.

//function getHouseholdBills($home_id, $user_id) {
//    require("../db.php");
//
//    try {
//        $results = $db->query("
//            SELECT * FROM bills
//	          INNER JOIN bill_user
//		        ON bills.home_id = 1
//	          INNER JOIN users
//		        ON bill_user.user_id = 1;
//            ");
//    } catch (Exception $e) {
//        echo("Could not get Home");
//        exit;
//    }
//
//    $bills = $results->fetchAll(PDO::FETCH_ASSOC);
//    return $bills;
//}

//function getHouseholdBills($home_id, $user_id) {
//    require("../db.php");
//
//    try {
//        $results = $db->query("
//            SELECT *
//            FROM bills
//              INNER JOIN users
//                ON bill_user.user_id = 1
//              INNER JOIN bills
//                ON bill_user.bill_id = 1;
//            ");
//    } catch (Exception $e) {
//        echo("Could not get Home");
//        exit;
//    }
//
//    $household = $results->fetch(PDO::FETCH_ASSOC);
//    return $household;
//}