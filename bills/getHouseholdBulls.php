<?php
    header('Access-Control-Allow-Origin: *');
    $home_id = $_GET["homeId"];
    require "../config.php";
    require("../db.php");
//    $bill_with_users = [];
    $bill = [];

try {
    $results = $db->prepare("SELECT * FROM `bills` WHERE home_id = ?");
    $results->bindValue(1, $home_id);
    $results->execute();
} catch (Exception $e) {
    echo("Could Not Return Bills");
    exit;
}

$bills = $results->fetchAll(PDO::FETCH_ASSOC);
//foreach ($bills as $bill){
//    try {
//        $bill_id = $bill["bill_id"];
//
//        $results = $db->query("
//                SELECT
//                  bill_user.user_amount as amount_paid,
//                  bill_user.user_owed as amount_owed,
//                  users.firstName as paid_by,
//                  users.color as user_color
//                FROM users
//                  INNER JOIN bill_user
//                    ON users.user_id = bill_user.user_id
//                    WHERE bill_user.bill_id = $bill_id;");
//
//        $bill_info = $results->fetchAll(PDO::FETCH_ASSOC);
//        $bill_with_users[$bill_id]["bill_info"] = $bill;
//        $bill_with_users[$bill_id]["bill_users"] = $bill_info;
//    } catch (Exception $e){
//        echo("Could not get Broadcasts");
//        exit;
//    }
//}

echo(json_encode((array) $bills));