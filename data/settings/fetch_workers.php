<?php

session_start();
include "$_SERVER[DOCUMENT_ROOT]/dbconnect.php";

$columns = array('MitarbeiterID', 'Vorname','Nachname');
$query = "SELECT * FROM tb_employees";
$result = mysqli_query($db, $query);

if(isset($_POST["search"]["value"]))
{
 $query .= '
 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].'
 ';
}
else
{
 $query .= " ";
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
 $sub_array[] =  '<div>'.$row["employeeID"].'</div>';
 $sub_array[] =  '<div>'.$row["name"].'</div>';
 $sub_array[] =  '<div>'.$row["surname"].'</div>';
 $sub_array[] =  '<div></div>';
 $sub_array[] =  '<div></div>';
 $data[] = $sub_array;
}

function get_all_data($db)
{
 $query = "SELECT * FROM tb_employees";
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
