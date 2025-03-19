<?php
session_start();
$servername = 'localhost';
$username = 'DBAdmin';
$password = '3v0E@bd71!!';
$dbname = 'd3_projects';

$db = mysqli_connect("$servername", "$username", "$password", "$dbname");
if (!$db) {
  echo mysqli_connect_error();
}
