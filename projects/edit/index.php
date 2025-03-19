<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
include "../../include/check_login.php";

include "$_SERVER[DOCUMENT_ROOT]/dbconnect.php";

$projectID = $_GET["projectID"];
$permission = $_SESSION["function"];
$projectTitle = '';
$customerID;

$sql = "Select * from tb_projects WHERE projectID = ".$projectID."";
                                    
$result = mysqli_query($db, $sql);
    while($row = mysqli_fetch_array($result))
    {
        $projectTitle = $row['projectTitle'];
        $customerID = $row['customerID'];
    }

$fetch_customerdata ="Select * from tb_customer WHERE customerID = ".$customerID."";
$result_customerdata = mysqli_query($db, $fetch_customerdata);
while($row2 = mysqli_fetch_array($result_customerdata))
{
    $customerName = $row2['name'] . ' ' . $row2['surname'];
    $companyName = $row2['companyname'];
    $customerStreet = $row2['street'];
    $customerZIPCity = $row2['zip'] . ' ' . $row2['city'];
    $customerCountry = $row2['country'];
    $customerPhone = $row2['phone'];
    $customerEmail = $row2['email'];
    $customerVAT = $row2['vat'];
}
                    
?>

<!DOCTYPE html>
<html>
	<head>
        <?php include "../../include/meta.php";?>
		

		<title>Projektmanagement | bearbeiten</title>


        <link rel="stylesheet" href="/css/wt_style.css">
        <link rel="stylesheet" href="/css/wt_style_tabs.css">
        <link rel="stylesheet" href="/css/extern/dataTables.dataTables.min.css">

        <link type="text/css" rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" />
        <link type="text/css" rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.1/css/buttons.dataTables.css" />
        <link type="text/css" rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.css" />
        <link type="text/css" rel="stylesheet" href="https://cdn.datatables.net/select/2.0.0/css/select.dataTables.css" />
        <link type="text/css" rel="stylesheet" href="https://cdn.datatables.net/datetime/1.5.2/css/dataTables.dateTime.min.css" />
        <link type="text/css" rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.2/css/responsive.dataTables.css" />
        <link type="text/css" rel="stylesheet" href="/data/DataTablesEditor/css/editor.dataTables.css" />
        



        <script src="/js/extern/fontawesome.js" crossorigin="anonymous"></script>

        <script src="/js/extern/jquery.min.js"></script>     <!-- jQuery library -->
        <script src="/js/extern/jquery3.7.1.js"></script>     <!-- jQuery library -->
        <script src="/js/extern/dataTables.min.js"></script>

        <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>        

        <script src="https://cdn.datatables.net/datetime/1.5.2/js/dataTables.dateTime.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/3.0.1/js/dataTables.buttons.js"></script>
        <script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.dataTables.js"></script>
        <script src="https://cdn.datatables.net/select/2.0.0/js/dataTables.select.js"></script>
        <script src="https://cdn.datatables.net/select/2.0.0/js/select.dataTables.js"></script>
        <script src="https://cdn.datatables.net/datetime/1.5.2/js/dataTables.dateTime.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/3.0.2/js/dataTables.responsive.js"></script>
        <script src="https://cdn.datatables.net/responsive/3.0.2/js/responsive.dataTables.js"></script>

        <script src="/data/DataTablesEditor/js/dataTables.editor.js"></script>
        <script src="/data/DataTablesEditor/js/editor.dataTables.js"></script>

        <script type="text/javascript" src="/js/intern/project_edit.js"></script>




	</head>
	<body class="loggedin">
        
        <?php include "../../include/navigation.php";?>
		<div class="content">                           <!-- hier gehts los -->
            <div class="card">
                <div class="card-header">
                    <h2>Projekt Nr. <b><i><?=$projectID?> | <?php echo $row['projectTitle']?> </i></b> bearbeiten</h2>                
                </div>
                <div class="card-body">
                    <fieldset>
                        <legend>Projektdaten</legend>
                        <div class="row">   
                            <div class="col">
                                <table>
                                    <tbody>
                                        <tr>
                                        <p id="permission" hidden><?php echo $permission ?></p>
                                            <td>Projektnummer:</td>
                                            <td>
                                                <input class="wt_form-control" id="ip_projectid" value="<?php echo $projectID?>" readonly/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Projektname:</td>
                                            <td>
                                                <input class="wt_form-control" id="ip_projectname" value="<?php echo $projectTitle?>" readonly/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Kundennummer:</td>
                                            <td>
                                                <input class="wt_form-control" id="ip_projectname" value="<?php echo $customerID?>" readonly/>
                                            </td>
                                        </tr>
                                        <tr>
                                            
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>Projektstatus:</td>
                                            <td>
                                                <input class="wt_form-control" id="ip_projectid" value="" readonly/>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>                            
                        </div>
                        
                    </fieldset>

                    <fieldset>
                        <legend>Kundenstammdaten</legend>
                        <div class="row">
                            <div class="col">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>Adresse</td>
                                            <td><?php echo $companyName?></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><?php echo $customerName?></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col">
                            <table>
                                    <tbody>
                                        <tr>
                                            <td>Telefonnummer</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>E-Mail</td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </fieldset>
                    <div class="tabs">
                        <?php include "tabHours.php"?>
                        <?php include "tabArticles.php"?>
                        <?php if($_SESSION['function'] == 1) { include "tabVoucher.php" ;}?>
                    </div>
                    <?php include "../../include/modal_addHours.php"?>
                    <?php include "../../include/modal_addArticleToProject.php"?>
                
                        
                </div>            
            </div>
			<?php include '../../include/footer.php'; ?>
		</div>
	</body>
    <script type="text/javascript" src="/js/intern/project_edit_modal.js"></script>
</html>

