<?php
    header('Access-Control-Allow-Origin: *');
    require("../check-session.php");
    require("../db.php");
//    $home_id = $_GET['homeId'];
    $home_id = '1';
    $chores_complete_incomplete = [];
    $chores_active_inactive = [];

    try {
        $results = $db->query("
            SELECT
                homeck.chores.chore_id as chore_id,
                homeck.chores.title as chore_name,
                homeck.chores_users.notes as notes,
                homeck.chores_users.active as active,
                homeck.chores_users.completed as completed,
                homeck.chores_users.user_id as user_id,
                homeck.users.firstName as chore_owner,
                homeck.users.color as user_color
            FROM homeck.chores_users
	          INNER JOIN homeck.chores
		        ON homeck.chores_users.chore_id = homeck.chores.chore_id
	          INNER JOIN homeck.users
		        ON homeck.chores_users.user_id = homeck.users.user_id
		          WHERE homeck.chores_users.home_id = $home_id
		          AND homeck.chores_users.active = 1
		          AND homeck.chores_users.completed = 1;");
    } catch (Exception $e) {
        echo("Could not get Home 1");
        exit;
    }
    $active_complete = $results->fetchAll(PDO::FETCH_ASSOC);
    $chores_complete_incomplete["complete"] = $active_complete;

    try {
        $results = $db->query("
                SELECT
                    homeck.chores.chore_id as chore_id,
                    homeck.chores.title as chore_name,
                    homeck.chores_users.notes as notes,
                    homeck.chores_users.active as active,
                    homeck.chores_users.completed as completed,
                    homeck.chores_users.user_id as user_id,
                    homeck.users.firstName as chore_owner,
                    homeck.users.color as user_color
                FROM homeck.chores_users
                    INNER JOIN homeck.chores
                        ON homeck.chores_users.chore_id = homeck.chores.chore_id
                    INNER JOIN homeck.users
                        ON homeck.chores_users.user_id = homeck.users.user_id
                        WHERE homeck.chores_users.home_id = $home_id
                        AND homeck.chores_users.active = 1
                        AND homeck.chores_users.completed = 0;");
    } catch (Exception $e) {
        echo("Could not get Home 2");
        exit;
    }
    $active_incomplete = $results->fetchAll(PDO::FETCH_ASSOC);
    $chores_complete_incomplete["incomplete"] = $active_incomplete;

    try {
        $results = $db->query("
                    SELECT
                        homeck.chores.chore_id as chore_id,
                        homeck.chores.title as chore_name,
                        homeck.chores_users.notes as notes,
                        homeck.chores_users.active as active,
                        homeck.chores_users.completed as completed,
                        homeck.chores_users.user_id as user_id,
                        homeck.users.firstName as chore_owner,
                        homeck.users.color as user_color
                    FROM homeck.chores_users
                        INNER JOIN homeck.chores
                            ON homeck.chores_users.chore_id = homeck.chores.chore_id
                        INNER JOIN homeck.users
                            ON homeck.chores_users.user_id = homeck.users.user_id
                            WHERE homeck.chores_users.home_id = $home_id
                            AND homeck.chores_users.active = 0");
    } catch (Exception $e) {
        echo("Could not get Home 3");
        exit;
    }
    $inactive_chores["all"] = $results->fetchAll(PDO::FETCH_ASSOC);
    $chores_active_inactive["active"] = $chores_complete_incomplete;
    $chores_active_inactive["inactive"] = $inactive_chores;
    echo(json_encode($chores_active_inactive));