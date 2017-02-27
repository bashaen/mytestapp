<?php
    $amount      = $_POST['amount'];
    $bill_id     = $_POST['billId'];
    $user_id     = $_POST['userId'];

    require("../db.php");

    try {
        $db->query("UPDATE `bill_user` SET `user_amount`='$amount' WHERE `bill_id`='$bill_id' AND `user_id` = $user_id");
        echo("Updated Bill");
    } catch (Except $e) {
        echo("Could Not make Bill Payment in db");
    }