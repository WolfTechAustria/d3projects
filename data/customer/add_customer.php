<?php
session_start();
include "../../dbconnect.php";

$insertCustomer = "INSERT INTO tb_customer (customerID, name, surname, companyname, street, zip, city, country, phone, email, vat) VALUES ('".$_POST["customerID"]."','".$_POST["name"]."','".$_POST["surname"]."','".$_POST["companyname"]."','".$_POST["street"]."','".$_POST["zip"]."','".$_POST["city"]."','".$_POST["country"]."','".$_POST["phone"]."','".$_POST["email"]."','".$_POST["vat"]."')";
if(mysqli_query($db, $insertCustomer))
{
    $updateNumberrange = "UPDATE tb_numberrange SET customerID = customerID + 1";
      if(mysqli_query($db, $updateNumberrange))
      {
          echo 'customerID updated';
      }
    
}

?>