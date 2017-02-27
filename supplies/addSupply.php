<?php
    require("../check-session.php");
    require("../db.php");

    $home_id      = $_POST['homeId'];
    $name         = $_POST['name'];
    $amount       = $_POST['amount'];
    $brand        = $_POST['brand'];
    $date         = $_POST['date'];
    $description  = $_POST['description'];
    $price        = $_POST['price'];
    $recurring    = $_POST['recurring'];
    $user_id      = $_POST['supply_owner'];

    try {
        $length = $db->query("SELECT count(*) FROM `supplies` WHERE supply_name = '$name' AND brand = '$brand'");

        if( $length < 1 ) {
            try {
                $db->query("INSERT INTO `supplies`(`supply_id`, `supply_name`, `amount`, `brand`) VALUES (NULL, '$name', '$amount', '$brand');");

                try {
                    $results = $db->prepare("SELECT * FROM `supplies` WHERE supply_name = ? AND brand = ?");
                    $results->bindValue(1, $name);
                    $results->bindValue(1, $brand);
                    $results->execute();
                } catch (Except $e) {
                    echo("Failed to add supply.");
                }

            } catch (Except $e) {
                echo("Failed to add supply.");
            }
        } else {
            echo("That Item Already Exists");
        }
    } catch (Except $e) {
        echo("Failed to add supply.");
    }

//$supply_item = $results->fetch(PDO::FETCH_ASSOC);
//$supply_id   = $supply_item["supply_id"];
//
//try {
//    $db->query("INSERT INTO `supply_user`(`supply_user_id`, `supply_id`, `user_id`) VALUES (NULL, '$supply_id', '$user_id');");
//    echo("Added Supply_User");
//} catch (Except $e) {
//    echo("Failed to add supply_user.");
//}