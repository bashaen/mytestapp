<?php
    $bill_id   = $_POST['billId'];

    require("../db.php");

    try {
        $db->query("DELETE FROM `bills` WHERE `bill_id`='$bill_id'");
        echo("Bill Deleted from bill list");
        try {
            $db->query("DELETE FROM `bill_user` WHERE `bill_id`='$bill_id'");
            echo("Bill Deleted from bill user list");
        } catch (Except $e) {
            echo("Could Not delete Bill in db");
        }
    } catch (Except $e) {
        echo("Could Not delete Bill in db");
    }