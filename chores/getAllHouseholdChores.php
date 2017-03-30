<?php
    require("../check-session.php");
    require("../db.php");
    $home_id = $_GET['homeId'];
    $home_id = '1';
    $chores_complete_incomplete = [];
    $chores_active_inactive = [];

    try {
        $results = $db->query("
            SELECT
                chores.chore_id as chore_id,
                chores.title as chore_name,
                chores_users.notes as notes,
                chores_users.active as active,
                chores_users.completed as completed,
                chores_users.user_id as user_id,
                users.firstName as chore_owner,
                users.color as user_color
            FROM chores_users
	          INNER JOIN chores
		        ON chores_users.chore_id = chores.chore_id
	          INNER JOIN users
		        ON chores_users.user_id = users.user_id
		          WHERE chores_users.home_id = $home_id
		          AND chores_users.active = 1
		          AND chores_users.completed = 1;");
    } catch (Exception $e) {
        echo("Could not get Home");
        exit;
    }
    $active_complete = $results->fetchAll(PDO::FETCH_ASSOC);
    $chores_complete_incomplete["complete"] = $active_complete;

    try {
        $results = $db->query("
                SELECT
                    chores.chore_id as chore_id,
                    chores.title as chore_name,
                    chores_users.notes as notes,
                    chores_users.active as active,
                    chores_users.completed as completed,
                    chores_users.user_id as user_id,
                    users.firstName as chore_owner,
                    users.color as user_color
                FROM chores_users
                    INNER JOIN chores
                        ON chores_users.chore_id = chores.chore_id
                    INNER JOIN users
                        ON chores_users.user_id = users.user_id
                        WHERE chores_users.home_id = $home_id
                        AND chores_users.active = 1
                        AND chores_users.completed = 0;");
    } catch (Exception $e) {
        echo("Could not get Home");
        exit;
    }
    $active_incomplete = $results->fetchAll(PDO::FETCH_ASSOC);
    $chores_complete_incomplete["incomplete"] = $active_incomplete;

    try {
        $results = $db->query("
                    SELECT
                        chores.chore_id as chore_id,
                        chores.title as chore_name,
                        chores_users.notes as notes,
                        chores_users.active as active,
                        chores_users.completed as completed,
                        chores_users.user_id as user_id,
                        users.firstName as chore_owner,
                        users.color as user_color
                    FROM chores_users
                        INNER JOIN chores
                            ON chores_users.chore_id = chores.chore_id
                        INNER JOIN users
                            ON chores_users.user_id = users.user_id
                            WHERE chores_users.home_id = $home_id
                            AND chores_users.active = 0");
    } catch (Exception $e) {
        echo("Could not get Home");
        exit;
    }
    $inactive_chores["all"] = $results->fetchAll(PDO::FETCH_ASSOC);
    $chores_active_inactive["active"] = $chores_complete_incomplete;
    $chores_active_inactive["inactive"] = $inactive_chores;
    echo(json_encode($chores_active_inactive));