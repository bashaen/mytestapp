<?php
session_start();
if ( isset( $_SESSION["user_id"] ) ) {
    echo json_encode(array(data => $_SESSION));
} else {
    echo json_encode( array( data => array( "status" => "No Session" ) ) );
}