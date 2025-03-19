<?php

session_start();
include "$_SERVER[DOCUMENT_ROOT]/dbconnect.php";
$projectID = $_GET["projectID"];

$columns = array('Datum', 'Mitarbeiter','Stunden');
$query = "SELECT * FROM tb_projects_positions WHERE projectID = $projectID";
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
    $date = date_format(date_create($row["date"]), "d.m.Y");
    $sub_array = array();
    $sub_array[] = '<div>' . $date . '</div>';
    $sub_array[] = '<div>' . $row["articleAmount"] . '</div>';
    $sub_array[] = '<div>' . $row["articleName"] . '</div>';
    $sub_array[] = '<div>' . $row["articleDescription"] . '</div>';
    $data[] = $sub_array;
}


function get_all_data($db, $projectID)
{
 $query = "SELECT * FROM tb_projects_positions WHERE projectID = $projectID";
 $result = mysqli_query($db, $query);
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($db, $projectID),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);

echo json_encode($output);

?>