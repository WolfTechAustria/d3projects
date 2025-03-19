<?php
session_start();
include "../../dbconnect.php";

$insertCustomer = "INSERT INTO tb_article (articleID, name, description, pricePurchaseNET, tax, priceSellingNET, unit) VALUES ('".$_POST["articleID"]."','".$_POST["articlename"]."','".$_POST["articleDescription"]."','".$_POST["ekNET"]."','".$_POST["tax"]."','".$_POST["vkNET"]."','".$_POST["unit"]."')";
if(mysqli_query($db, $insertCustomer))
{
    $updateNumberrange = "UPDATE tb_numberrange SET articleID = articleID + 1";
      if(mysqli_query($db, $updateNumberrange))
      {
          echo 'articleID updated';
      }
    
}

?>