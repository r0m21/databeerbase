<?php

ob_start();
error_reporting(E_ALL ^ E_NOTICE | E_WARNING);
ini_set('display_errors', 'ON');
mb_internal_encoding('UTF-8');
date_default_timezone_set("Europe/Paris");
header('Content-type: text/html; charset=utf-8');

define('DB_DSN', 'mysql:dbname=databeerbase;host=localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

require_once 'functions.common.php';