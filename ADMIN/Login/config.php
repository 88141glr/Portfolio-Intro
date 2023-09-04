<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$db_hostname = 'localhost';
$db_username = 'db88141';
$db_password = 'Kaas1001!';
$db_database = '88141_database';

$mysqli = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);

if(!$mysqli) {
    echo "FOUT: geen connectie naar database. <br/>";
    echo "Error: " . mysqli_connect_error() . "<br/>";
    exit;
} else {
    echo "";
}