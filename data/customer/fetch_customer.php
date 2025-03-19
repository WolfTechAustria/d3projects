<?php

session_start();
include "$_SERVER[DOCUMENT_ROOT]/dbconnect.php";

$columns = array('Kundennummer', 'Firma','Name');
$query = "SELECT * FROM tb_customer";
$result = mysqli_query($db, $query);
if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE companyname LIKE "%'.$_POST["search"]["value"].'%"
 OR name LIKE "%'.$_POST["search"]["value"].'%"
 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].'
 ';
}
else
{
 $query .= 'ORDER BY customerID ';
}

$query1 = '';

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows($result);

$result = mysqli_query($db, $query . $query1);

$data = array();

while($row = mysqli_fetch_array($result))
{
 $sub_array = array();
 $sub_array[] = '<div>' . $row["customerID"] . '</div>';
 $sub_array[] = '<div>' . $row["companyname"] . '</div>';
 $sub_array[] = '<div>' . $row["name"] . ' '. $row["surname"] .'</div>';
 $sub_array[] = '<a name="edit" class="btn btn-xs btn-info edit" id="'.$row["customerID"].'" href="/customer/edit?projectID='.$row["customerID"].'"><i class="fas fa-edit"></i></a> <button type="button" name="delete" class="btn btn-xs btn-danger delete" id="'.$row["ID"].'"><i class="fas fa-trash"></i></button>';
 $data[] = $sub_array;
}

function get_all_data($db)
{
 $query = "SELECT * FROM tb_customer";
 $result = mysqli_query($db, $query);
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($db),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);

echo json_encode($output);

?>
