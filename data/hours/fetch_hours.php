<?php

session_start();
include "$_SERVER[DOCUMENT_ROOT]/dbconnect.php";
$projectID = $_GET["projectID"];

$columns = array('Datum', 'Mitarbeiter','Stunden', 'Arbeitsbeschreibung');
$query = "SELECT * FROM tb_hours INNER JOIN tb_employees ON tb_hours.employeeID = tb_employees.employeeID";
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
 $hours = 0;
 $startTime = strtotime($row["start"]);
 $endTime = strtotime($row["end"]);
 $hours = ($endTime - $startTime) / 60 / 60; 

 $sub_array = array();
 $sub_array[] =  '<div>'.$row["date"].'</div>';
 $sub_array[] =  '<div>'.$row["name"].' '.$row["surname"].'</div>';
 $sub_array[] =  '<div>'.$hours.'</div>';
 $sub_array[] =  '<div>'.$row["start"].'</div>';
 $sub_array[] =  '<div>'.$row["end"].'</div>';
 $sub_array[] =  '<div>'.$row["description"].'</div>';
 $sub_array[] =  '<div>'.$row["projectID"].'</div>';
 $sub_array[] =  '<div></div>';
 $data[] = $sub_array;
}

function get_all_data($db)
{
 $query = "SELECT * FROM tb_hours";
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
