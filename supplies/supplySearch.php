<?php
    $supplySearchNameText  = $_GET['supplySearchNameText'];
    $supplySearchBrandText = $_GET['supplySearchBrandText'];
    require("../db.php");

    try {
        $results = $db->prepare("SELECT * FROM supplies WHERE supply_name LIKE ? AND brand LIKE ?");
        $results->bindValue(1, $supplySearchNameText . "%");
        $results->bindValue(2, $supplySearchBrandText . "%");
        $results->execute();
    } catch (Except $e) {
        echo("Could Not Find Supplies in db");
    }

    $all_supplies = $results->fetchAll(PDO::FETCH_ASSOC);
    if ( $all_supplies ) {
        echo(json_encode($all_supplies));
    } else {
        echo "No Supplies that meet that criteria";
    }