<?php
    require("../check-session.php");
    require("../db.php");

    session_destroy();
    echo(json_encode( array( "data" => array( "status" => "No Session") ) ) );
