<?php
if(isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
    switch($action) {
        case 'addChore':
            $home_id     = $_POST['homeId'];
            $user_id     = NULL;
            $title       = $_POST['title'];
            $description = $_POST['description'];
            $active      = $_POST['active'];
            $completed   = $_POST['completed'];
            addChore($home_id, $user_id, $title, $description, $active, $completed);
            break;
        case 'activateChore':
            $chore_id    = $_POST['choreId'];
            $user_id     = $_POST['userId'];
            activateChore($chore_id, $user_id);
            break;
        case 'deactivateChore':
            $chore_id    = $_POST['choreId'];
            deactivateChore($chore_id);
            break;
        case 'assignUserChore':
            $chore_id    = $_POST['choreId'];
            $user_id     = $_POST['userId'];
            assignUserChore($chore_id, $user_id);
            break;
        case 'unAssignUserChore':
            $chore_id    = $_POST['choreId'];
            unAssignUserChore($chore_id);
            break;
        case 'completeChore':
            $chore_id    = $_POST['choreId'];
            completeChore($chore_id);
            break;
        case 'incompleteChore':
            $chore_id    = $_POST['choreId'];
            inCompleteChore($chore_id);
            break;
        case 'updateChore':
            $chore_id    = $_POST['choreId'];
            $user_id     = $_POST['userId'];
            $title       = $_POST['title'];
            $description = $_POST['description'];
            $active      = $_POST['active'];
            $completed   = $_POST['completed'];
            updateChore($chore_id, $user_id, $title, $description, $active, $completed);
            break;
        case 'deleteChore':
            $chore_id   = $_POST['choreId'];
            deleteChore($chore_id);
            break;
    }
}

function addChore ($home_id, $user_id, $title, $description, $active, $completed) {
    require("../db.php");

    try {
        $db->query("INSERT INTO `chores`(`chore_id`, `home_id`, `user_id`, `title`, `description`, `active`, `completed`) VALUES (NULL, '$home_id', '1', '$title', '$description', '$active', '$completed');");
    } catch (Except $e) {
        echo("Could Not add Chore to db");
    }
}

function updateChore ($chore_id, $user_id, $title, $description, $active, $completed) {
    require("../db.php");

    try {
        $db->query("UPDATE `chores` SET `user_id`='$user_id', `title`='$title', `description`='$description', `active`='$active', `completed`='$completed' WHERE `chore_id`='$chore_id'");
    } catch (Except $e) {
        echo("Could Not update Chore in db");
    }
}

function deleteChore ($chore_id) {
    require("../db.php");

    try {
        $db->query("DELETE FROM `chores` WHERE `chore_id`='$chore_id'");
    } catch (Except $e) {
        echo("Could Not delete Chore in db");
    }
}

function activateChore ($chore_id, $user_id) {
    require("../db.php");

    try {
        $db->query("UPDATE `chores` SET `user_id`='$user_id', `active`='1' WHERE `chore_id`='$chore_id'");
    } catch (Except $e) {
        echo("Could Not Activate Chore in db");
    }
}

function deactivateChore ($chore_id) {
    require("../db.php");

    try {
        $db->query("UPDATE `chores` SET `active`='0' WHERE `chore_id`='$chore_id'");
    } catch (Except $e) {
        echo("Could Not Deactivate Chore in db");
    }
}

function assignUserChore ($chore_id, $user_id) {
    require("../db.php");

    try {
        $db->query("UPDATE `chores` SET `user_id`='$user_id' WHERE `chore_id`='$chore_id'");
    } catch (Except $e) {
        echo("Could Not Assign User Chore in db");
    }
}

function unAssignUserChore ($chore_id) {
    require("../db.php");

    try {
        $db->query("UPDATE `chores` SET `user_id`='0' WHERE `chore_id`='$chore_id'");
    } catch (Except $e) {
        echo("Could Not Un Assign User Chore in db");
    }
}

function completeChore ($chore_id) {
    require("../db.php");

    try {
        $db->query("UPDATE `chores` SET `completed`='1' WHERE `chore_id`='$chore_id'");
    } catch (Except $e) {
        echo("Could Not Complete User Chore in db");
    }
}

function inCompleteChore ($chore_id) {
    require("../db.php");

    try {
        $db->query("UPDATE `chores` SET `completed`='0' WHERE `chore_id`='$chore_id'");
    } catch (Except $e) {
        echo("Could Not Incomplete User Chore in db");
    }
}

// FIXME : This does not grab the right "Chore Owner" / User from users field;
function getAllHouseholdChores($home_id) {
    require("../db.php");

    try {
        $results = $db->query("
            SELECT
              chores.chore_id as chore_id,
              chores.title as name,
              chores.description as notes,
              chores.active as active,
              chores.completed as completed,
              chores.user_id as user_id,
              users.firstName as chore_owner,
              users.color as user_color

            FROM chores
              INNER JOIN users
                ON chores.home_id = 1");
    } catch (Exception $e) {
        echo("Could not get Home");
        exit;
    }

    $chores = $results->fetchAll(PDO::FETCH_ASSOC);
    return $chores;
}
