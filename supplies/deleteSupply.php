<?php
if(isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
    switch($action) {
        case 'deleteSupply':
            $supply_id   = $_POST['supplyId'];
            deleteSupply($supply_id);
            break;
    }
}

function deleteSupply ($supply_id) {
    require("../db.php");
    try {
        $db->query("DELETE FROM `supplies` WHERE `supply_id`='$supply_id'");
        try {
            $db->query("DELETE FROM `supply_user` WHERE `supply_id`='$supply_id'");
            echo("Success");
        } catch (Except $e) {
            echo("Fail");
        }
    } catch (Except $e) {
        echo("Fail");
    }
}