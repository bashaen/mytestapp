<?

//function getAllHouseholdSupplies($home_id) {
//    require("../db.php");
//
//    try {
//        $results = $db->query("
//            SELECT
//              chores.title as name,
//              chores.description as notes,
//              chores.active as active,
//              chores.completed as completed,
//              users.firstName as chore_owner,
//              users.color as user_color
//
//            FROM chores
//              INNER JOIN users
//                ON chores.home_id = $home_id;
//            ");
//    } catch (Exception $e) {
//        echo("Could not get Home");
//        exit;
//    }
//
//    $chores = $results->fetchAll(PDO::FETCH_ASSOC);
//    return $chores;
//}
