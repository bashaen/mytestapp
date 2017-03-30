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
        $length = $db->query("SELECT * FROM `supplies` WHERE supply_name = '$name' AND brand = '$brand'");
        $_length = $length->fetchAll(PDO::FETCH_ASSOC);
        $a = count($_length);

        if( $a > 0 ) {
            echo("That Item Already Exists");
            try {
                $get_supply = $db->query("SELECT * FROM `supplies` WHERE supply_name = '$name' AND brand = '$brand'");
                $supply_item = $get_supply->fetchAll(PDO::FETCH_ASSOC);

                try {
                    $supply_id = $supply_item[0]["supply_id"];
                    $add_supply = $db->query("INSERT INTO `supply_user`(`supply_user_id`, `supply_id`, `user_id`, `description`, `price`, `home_id`, `date_needed`, `future`, `active`, `amount`) VALUES (NULL, '$supply_id', '$user_id', '$description', '$price', '$home_id', '$date', 0, 1, '$amount');");
                    echo("Item Added To list");
                } catch (Except $e) {
                    echo("No Item Added To list");
                }
            } catch (Except $e) {
                echo("Failed to get Item");
            }
        } else {
            try {
                $add_supply = $db->query("INSERT INTO `supplies`(`supply_id`, `supply_name`, `brand`) VALUES (NULL, '$name', '$brand');");
            } catch (Except $e) {
                echo("Failed to add supply.");
            }

            try {
                $get_supply = $db->query("SELECT * FROM `supplies` WHERE supply_name = '$name' AND brand = '$brand'");
                $supply_item = $get_supply->fetchAll(PDO::FETCH_ASSOC);

                try {
                    $supply_id = $supply_item[0]["supply_id"];
                    $add_supply = $db->query("INSERT INTO `supply_user`(`supply_user_id`, `supply_id`, `user_id`, `description`, `price`, `home_id`, `date_needed`, `future`, `active`, `amount`) VALUES (NULL, '$supply_id', '$user_id', '$description', '$price', '$home_id', '$date', 0, 1, '$amount');");
                    echo("Item Added To list");
                } catch (Except $e) {
                    echo("No Item Added To list");
                }
            } catch (Except $e) {
                echo("Failed to get Item");
            }
        }
    } catch (Except $e) {
        echo("Failed to add supply.");
    }

//    function addItemToSupplyUserList(){
//        try {
//            $get_supply = $db->query("SELECT * FROM `supplies` WHERE supply_name = '$name' AND brand = '$brand'");
//            $supply_item = $get_supply->fetchAll(PDO::FETCH_ASSOC);
//
//            try {
//                $supply_id = $supply_item[0]["supply_id"];
//                $add_supply = $db->query("INSERT INTO `supply_user`(`supply_user_id`, `supply_id`, `user_id`, `description`, `price`, `home_id`, `date_needed`, `future`, `active`, `amount`) VALUES (NULL, '$supply_id', '$user_id', '$description', '$price', '$home_id', '$date', 0, 1, '$amount');");
//                echo("Item Added To list");
//            } catch (Except $e) {
//                echo("No Item Added To list");
//            }
//        } catch (Except $e) {
//            echo("Failed to get Item");
//        }
//    }

//supply_id, user_id, description, price, home_id, date_needed, future, active, amount

//$supply_item = $results->fetch(PDO::FETCH_ASSOC);
//$supply_id   = $supply_item["supply_id"];
//
//try {
//    $db->query("INSERT INTO `supply_user`(`supply_user_id`, `supply_id`, `user_id`) VALUES (NULL, '$supply_id', '$user_id');");
//    echo("Added Supply_User");
//} catch (Except $e) {
//    echo("Failed to add supply_user.");
//}