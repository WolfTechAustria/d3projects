<?php

session_start();
include "$_SERVER[DOCUMENT_ROOT]/dbconnect.php";

$columns = array('Projektnummer', 'Kundennummer','Beschreibung');
$query = "SELECT * FROM tb_projects";
$result = mysqli_query($db, $query);
if(isset($_POST["search"]["value"]))
{
 $query .= '
 WHERE projectID LIKE "%'.$_POST["search"]["value"].'%"
 OR customerID LIKE "%'.$_POST["search"]["value"].'%"
 ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].'
 ';
}
else
{
 $query .= 'ORDER BY projectID ';
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
 $sub_array[] = '<div class="update" style="font-size:12pt;" data-id="'.$row["id"].'" data-column="Projektnummer">' . $row["projectID"] . '</div>';
 $sub_array[] = '<a style="text-decoration: none; color: black" href="/projects/edit?projectID='.$row["projectID"].'"><div class="update" style="font-size:12pt;" data-id="'.$row["id"].'" data-column="Projektname">' . $row["projectTitle"] . '</div></a>';
 $sub_array[] = '<div class="update" style="font-size:12pt;" data-id="'.$row["id"].'" data-column="Kunde">' . $row["customerID"] . ' | Kundenname</div>';
 $sub_array[] = '<a name="edit" class="btn btn-xs btn-info edit" id="'.$row["articleID"].'" href="/projects/edit?projectID='.$row["projectID"].'"><i class="fas fa-edit"></i></a> <button type="button" name="delete" class="btn btn-xs btn-danger delete" id="'.$row["id"].'"><i class="fas fa-trash"></i></button>';
 $data[] = $sub_array;
}

function get_all_data($db)
{
 $query = "SELECT * FROM tb_projects";
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
