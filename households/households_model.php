<?php
//if(isset($_POST['action']) && !empty($_POST['action'])) {
//    $action = $_POST['action'];
//    switch($action) {
//        case 'create_broadcast':
//            $bc_user = $_POST['user_id'];
//            $bc_title = $_POST['bc_title'];
//            $bc_message = $_POST['bc_message'];
//            createBroadcastPost($bc_title, $bc_message, $bc_user);
//            break;
//    }
//}

//function createBroadcastPost($bc_title, $bc_message, $bc_user){
//    require("../db.php");
//
//    try {
//        $db->query("INSERT INTO `broadcast_messages`(`bc_id`, `title`, `message`, `user_id`) VALUES (NULL, '$bc_title', '$bc_message', '$bc_user')");
//    } catch (Exception $e) {
//        echo('Could Not add Message to Broadcasts');
//    }
//}

//function getAllBroadcastPosts(){
//    require("../db.php");
//
//    try {
//        $results = $db->query("
//        SELECT *
//        FROM broadcast_messages
//        INNER JOIN users
//        ON user_id = u_id");
//    } catch (Exception $e){
//        echo("Could not get Broadcasts");
//        exit;
//    }
//
//    $posts = $results->fetchAll(PDO::FETCH_ASSOC);
//    return $posts;
//}
