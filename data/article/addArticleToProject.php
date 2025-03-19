<?php
session_start();
include "../../dbconnect.php";

$addArticleToProject = "INSERT INTO tb_projects_positions (projectID, articleID, articleDescription, articleAmount, articleName, date, user) VALUES ('".$_POST["projectID"]."','".$_POST["articleID"]."','".$_POST["articleDescription"]."','".$_POST["amount"]."','".$_POST["articleName"]."','".$_POST["date"]."','".$_SESSION['name']."')";
if(mysqli_query($db, $addArticleToProject))
{
    
}