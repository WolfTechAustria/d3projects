<?php
session_start();
include "$_SERVER[DOCUMENT_ROOT]/dbconnect.php";

$user = $_SESSION['user'];

  $sql = "INSERT INTO tb_projects(projectID, projectTitle, customerName, customerStreet, customerCity, customerZIP, customerCountry, customerPhone, user) VALUES('".$_POST["projectID"]."', '".$_POST["projectName"]."','".$_POST["customerName"]."','".$_POST["customerStreet"]."','".$_POST["customerCity"]."','".$_POST["customerZIP"]."','".$_POST["customerCounrty"]."','".$_POST["customerPhone"]."', '".$user."')";
  if(mysqli_query($db, $sql))
  {
      echo 'Projekt hinzugefügt';
      
        $updaternr = "UPDATE tb_numberrange SET projectID = projectID + 1";
        if(mysqli_query($db, $updaternr))
        {
            echo 'Projektnummerkreis aktualisiert';
        }
  }


?>
