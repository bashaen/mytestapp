<?php
    $bill_id = $_GET['billId'];
    $user_id = $_GET['userId'];
    require "../config.php";
    require("../db.php");

    echo($bill_id);

    try {
        $results = $db->query("
            SELECT
              bill_user.user_amount as amount_paid,
              bill_user.user_owed as amount_owed,
              users.firstName as paid_by,
              users.color as user_color
            FROM bill_user
              INNER JOIN users
                ON bill_user.bill_id = $bill_id;");
    } catch (Exception $e){
        echo("Could not get Broadcasts");
        exit;
    }

    $posts = $results->fetchAll(PDO::FETCH_ASSOC);