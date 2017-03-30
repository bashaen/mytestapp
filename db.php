<?php
    try {
//        $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT, DB_USER, DB_PASS);
        $db = new PDO("mysql:host=138.197.88.253;dbname=homec;port=3306", "andrew", "Cupcak3s123!");
//        $db = new PDO("mysql:host=localhost;dbname=homeck;port=3000", "root", "root");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->exec("SET NAMES 'utf8'");
    } catch ( Exception $e ) {
        echo("Could not connect to database");
        exit;
    }