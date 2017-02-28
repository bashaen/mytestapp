<?php
    header('Access-Control-Allow-Origin: *');
    require("../check-session.php");
    require("../db.php");
    $home_id = $_GET["home_id"];
    $supplies_with_severity = [];
    $supplies_re_usability = [];
    $supplies_response = [];
    $today = date('Y-m-d');
    $danger_date = date('Y-m-j', strtotime( '+2 day', strtotime($today)));
    $warning_date = date('Y-m-j', strtotime( '+5 day', strtotime($today)));

    try {
        $results = $db->prepare("SELECT * FROM `supply_user` INNER JOIN supplies ON supply_user.supply_id = supplies.supply_id WHERE home_id = ? AND date_needed <= $danger_date AND active = true");
        $results->bindValue(1, $home_id);
        $results->execute();
    } catch (Exception $e) {
        echo("Could Not Return Supplies");
        exit;
    }
    $supplies_danger = $results->fetchAll(PDO::FETCH_ASSOC);
    $supplies_with_severity["danger"] = $supplies_danger;

    try {
        $results = $db->prepare("SELECT * FROM `supply_user` INNER JOIN supplies ON supply_user.supply_id = supplies.supply_id WHERE home_id = ? AND date_needed > $danger_date AND date_needed <= $warning_date AND active = true");
        $results->bindValue(1, $home_id);
        $results->execute();
    } catch (Exception $e) {
        echo("Could Not Return Supplies");
        exit;
    }
    $supplies_warning = $results->fetchAll(PDO::FETCH_ASSOC);
    $supplies_with_severity["warning"] = $supplies_warning;

    try {
        $results = $db->prepare("SELECT * FROM `supply_user` INNER JOIN supplies ON supply_user.supply_id = supplies.supply_id WHERE home_id = ? AND date_needed > $warning_date AND active = true");
        $results->bindValue(1, $home_id);
        $results->execute();
    } catch (Exception $e) {
        echo("Could Not Return Supplies");
        exit;
    }
    $supplies_gouda = $results->fetchAll(PDO::FETCH_ASSOC);
    $supplies_with_severity["safe"] = $supplies_gouda;

    try {
        $results = $db->prepare("SELECT * FROM `supply_user` INNER JOIN supplies ON supply_user.supply_id = supplies.supply_id WHERE home_id = ? AND future = true AND active = false");
        $results->bindValue(1, $home_id);
        $results->execute();
    } catch (Exception $e) {
        echo("Could Not Return Supplies");
        exit;
    }
    $future_supplies_inactive = $results->fetchAll(PDO::FETCH_ASSOC);
    $supplies_re_usability["reusable_inactive"] = $future_supplies_inactive;

    $supplies_response["active"]   = $supplies_with_severity;
    $supplies_response["inactive"] = $supplies_re_usability;

    echo(json_encode($supplies_response));