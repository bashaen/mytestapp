<?php // These are required for DB calls
require "../config.php";
include "../users/users_model.php";
include "../households/households_model.php";
include "../bills/bills_model.php";
include "../chores/chores_model.php";
include "../supplies/supplies_model.php";
include "../meals/meals_model.php";

//// If User credentials exist the user is logged in and start session
//session_start();
//
//if( isset($_SESSION['broadchats_loggedin']) && $_SESSION['broadchats_loggedin'] != '' ) {
//    $user_id = $_SESSION['user_id'];
//
//    if($user_id !== "" && $user_id !== null){
//        $logged_in = true;
//        $user      = getSingleUser($user_id);
//        $home      = getUsersHousehold(1, 1);
//        $bills     = getHouseholdBills(1);
//        $chores    = getAllHouseholdChores(1);
//        $supplies  = getAllHouseholdSupplies(1);
//        $meals     = getAllHouseholdMeals(1);
//    } else {
//        $logged_in = false;
//    }
//}else{
//    $logged_in = false;
//    $user_id = "";
//    $current_user = "";
//}
//
