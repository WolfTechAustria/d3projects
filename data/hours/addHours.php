<?php
session_start();
include "../../dbconnect.php";

$insertHours = "INSERT INTO tb_hours (projectID, employeeID, date, start, end, description) VALUES ('".$_POST["projectID"]."','".$_POST["employeeID"]."','".$_POST["date"]."','".$_POST["startTime"]."','".$_POST["endTime"]."','".$_POST["description"]."')";
if(mysqli_query($db, $insertHours))
{
    
}

?>