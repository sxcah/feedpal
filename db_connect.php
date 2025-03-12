<?php
$server_name = 'localhost';
$username = 'mikko_root';
$password = '';
$database = 'feedpal_db';

$conn = new mysqli($server_name, $username, $password, $database);

if ($conn->connect_error){
    die("Connection Failed ".$conn->connect_error);
}
?>