<?php
session_start();
$_SESSION['name'] = 'Maheshrew';
echo json_encode(array('name' => $_SESSION));
