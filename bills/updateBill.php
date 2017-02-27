<?php
    $bill_id   = $_POST['billId'];
    $company   = $_POST['company'];
    $amount    = $_POST['amount'];
    $due_date  = $_POST['due_date'];
    $is_late   = $_POST['is_late'];
    $recurring = $_POST['is_recurring'];
    $past_due  = $_POST['past_due'];

    require("../db.php");

    try {
        $db->query("UPDATE `bills` SET `company`='$company', `amount`='$amount', `due_date`='$due_date', `is_late`='$is_late', `recurring`='$recurring', `past_due`='$past_due' WHERE `bill_id`='$bill_id'");
        echo("Updated Bill");
    } catch (Except $e) {
        echo("Could Not update Bill in db");
    }