function getHouseholdBills($home_id){
    require("../db.php");

    try {
        $results = $db->prepare("SELECT * FROM `bills` WHERE home_id = ?");
        $results->bindValue(1, 1);
        $results->execute();
    } catch (Exception $e) {
        echo("Could Not Return Bills");
        exit;
    }

    $bills = $results->fetchAll(PDO::FETCH_ASSOC);
    return $bills;
}

function getHouseholdUserBills($bill_id){
    require("../db.php");

    try {
        $results = $db->query("
        SELECT 
	      bill_user.user_amount as amount_paid, 
	      users.firstName as paid_by,
          users.color as user_color
        FROM bill_user
	      INNER JOIN users
		    ON bill_user.user_id = $bill_id;");
    } catch (Exception $e){
        echo("Could not get Broadcasts");
        exit;
    }

    $posts = $results->fetchAll(PDO::FETCH_ASSOC);
    return $posts;
}

// Possible functions to match up the user bills with the user amount paid.

//function getHouseholdBills($home_id, $user_id) {
//    require("../db.php");
//
//    try {
//        $results = $db->query("
//            SELECT * FROM bills
//	          INNER JOIN bill_user
//		        ON bills.home_id = 1
//	          INNER JOIN users
//		        ON bill_user.user_id = 1;
//            ");
//    } catch (Exception $e) {
//        echo("Could not get Home");
//        exit;
//    }
//
//    $bills = $results->fetchAll(PDO::FETCH_ASSOC);
//    return $bills;
//}

//function getHouseholdBills($home_id, $user_id) {
//    require("../db.php");
//
//    try {
//        $results = $db->query("
//            SELECT *
//            FROM bills
//              INNER JOIN users
//                ON bill_user.user_id = 1
//              INNER JOIN bills
//                ON bill_user.bill_id = 1;
//            ");
//    } catch (Exception $e) {
//        echo("Could not get Home");
//        exit;
//    }
//
//    $household = $results->fetch(PDO::FETCH_ASSOC);
//    return $household;
//}