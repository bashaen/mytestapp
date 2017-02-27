<?php
//function createNewUser($reg_username, $reg_first_name, $reg_last_name, $reg_email, $reg_image){
//  require("../db.php");
//
//  try {
//    $db->query("INSERT INTO `users`(`uid`, `username`, `first_name`, `last_name`, `email`, `self_rating`, `user_rating`, `main_img`, `description`) VALUES (NULL, '$reg_username', '$reg_first_name', '$reg_last_name', '$reg_email', 5.0, 5.0, '$reg_image', 'I have an awesome beard')");
//  } catch (Exception $e) {
//    echo('Could Not add user to db');
//  }
//}

//function createNewUser($reg_username, $reg_firstname, $reg_lastname, $reg_email, $reg_password, $reg_lat, $reg_long, $reg_zipcode){
//    require("../db.php");
//
//    try {
//        $db->query("INSERT INTO `users`(`u_id`, `username`, `password`, `email`, `firstname`, `lastname`, `birthdate`, `lat`, `long`, `zipcode`) VALUES (NULL, '$reg_username', '$reg_password', '$reg_email', '$reg_firstname', '$reg_lastname', '8/23/1987', '$reg_lat', '$reg_long', '$reg_zipcode')");
//        echo('User successfully added to db');
//    } catch (Exception $e) {
//        echo('Could Not add user to db');
//    }
//}

//function getAllUsers(){
//  require("../db.php");
//
//  try {
//    $results = $db->query("SELECT * FROM users");
//  }catch (Exception $e) {
//    echo("Could not get users");
//    exit;
//  }
//
//  $users = $results->fetchAll(PDO::FETCH_ASSOC);
//  return $users;
//}



//Example of how we're building the api endpoints
// The second 1 in bindValue is home_id
//    function getHouseholdBills($home_id){
//require "../config.php";
//require("../db.php");
//
//try {
//$results = $db->prepare("SELECT * FROM `bills` WHERE home_id = ?");
//$results->bindValue(1, 1);
//$results->execute();
//} catch (Exception $e) {
//echo("Could Not Return Bills");
//exit;
//}
//
////        var_dump($results);
//$bills = $results->fetchAll(PDO::FETCH_ASSOC);
//echo(json_encode($bills[0]));
//    }
