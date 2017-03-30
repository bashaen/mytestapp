<?php
    require("../db.php");

        try {
            $results = $db->query("
                SELECT 
                  users.user_id as user, 
                  households.home_id as home,
                  households.family_name as family_name
    
                FROM user_household
                  INNER JOIN users
                    ON user_household.user_id = 1
                  INNER JOIN households
                    ON user_household.home_id = 1;
                ");
        } catch (Exception $e) {
            echo("Could not get Home");
            exit;
        }

        $household = $results->fetch(PDO::FETCH_ASSOC);
        echo(json_encode($household));