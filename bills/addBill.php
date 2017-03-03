<?php
    header("Access-Control-Allow-Origin: *");
    $company     = $_POST['company'];
    $amount      = $_POST['amount'];
    $dueDate     = $_POST['dueDate'];
    $home_id     = $_POST['homeId'];
    $isRecurring = $_POST['isRecurring'];

    require("../db.php");

    try {
        $db->query("INSERT INTO `bills`(`bill_id`, `home_id`, `company`, `amount`, `due_date`, `is_late`, `recurring`, `past_due`, `is_paid`) VALUES (NULL, '1', '$company', $amount, '2017-01-08', 0, 0, 0, 0);");
        echo("Bill Added");
    } catch (Except $e) {
        echo("Could Not add Bill to db");
    }