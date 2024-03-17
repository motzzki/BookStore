<?php
$servername = "localhost";
$hostname = "root";
$password = "";
$dbname = "dbbookstore";

$mysqli = new mysqli($servername, $hostname, $password, $dbname);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>