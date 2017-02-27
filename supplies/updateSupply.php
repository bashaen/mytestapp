<?php
    if(isset($_POST['action']) && !empty($_POST['action'])) {
        $action = $_POST['action'];
        switch($action) {
            case 'updateSupply':
                $supply_id = $_POST['supplyId'];
                $name = $_POST['name'];
                $amount = $_POST['amount'];
                $brand = $_POST['brand'];
                updateSupply($supply_id, $name, $amount, $brand);
                break;
        }
    }

function updateSupply ($supply_id, $name, $amount, $brand) {
    require("../db.php");

    try {
        $db->query("UPDATE `supplies` SET `name`='$name', `amount`=$amount, `brand`='$brand' WHERE `supply_id`='$supply_id'");
        echo("Success");
    } catch (Except $e) {
        echo("Fail");
    }
}