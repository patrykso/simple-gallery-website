<?php
require '../../vendor/autoload.php';
session_start();
require_once '../dispatcher.php';
require_once '../routing.php';
require_once '../controllers.php';


$action_url = $_GET['action'];
dispatch($routing, $action_url);

?>