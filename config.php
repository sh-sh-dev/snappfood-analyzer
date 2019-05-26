<?php
include "vendor/autoload.php";

Dotenv\Dotenv::create(__DIR__)->load();

if (getenv('LOG')) {
    error_reporting(E_ALL);
    ini_set('display_errors', 'on');
}
date_default_timezone_set(getenv('TIMEZONE'));

$db = new mysqli(getenv('DB_HOST'), getenv('DB_USER'), getenv('DB_PASSWORD'), getenv('DB_NAME'));
$db->query("SET NAMES 'utf8mb4'");
$db->query("SET CHARACTER SET 'utf8mb4'");
$db->query("SET character_set_connection = 'utf8mb4'");

$appName = getenv('NAME');