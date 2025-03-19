<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
include "../include/check_login.php";

include "$_SERVER[DOCUMENT_ROOT]/dbconnect.php";
?>

<!DOCTYPE html>
<html>
	<head>
        <?php include "../include/meta.php";?>
		

		<title>Invoicery - Projektmanagement | Projektübersicht</title>


        <link rel="stylesheet" href="/css/wt_style.css">
        <link rel="stylesheet" href="/css/extern/dataTables.dataTables.min.css">

        <link type="text/css" rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" />



        <script src="/js/extern/jquery.min.js"></script>     <!-- jQuery library -->
        <script src="/js/extern/jquery3.7.1.js"></script>     <!-- jQuery library -->
        <script src="/js/extern/dataTables.min.js"></script>

        <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
        <script src="https://kit.fontawesome.com/6a831aa4b1.js" crossorigin="anonymous"></script>



        <script type="text/javascript" src="/js/intern/project_functions2.js"></script>


	</head>
	<body class="loggedin">
        <?php include "../include/navigation.php";?>
		<div class="content">                           <!-- hier gehts los -->
            <div class="card">
                <div class="card-header">
                    <h2>Projektübersicht</h2>
                </div>
                <div class="card-body">
                    
                <?php if($_SESSION['function'] == 1) {?>
                    <button id="opn_ModalCreateProject" class="btn btn-info">Projekt erstellen</button>
                    <?php }?>

                    <br><br>
                    <table id="projectsTable" class="table display responsive nowrap" width="100%">
                        <thead>
                            <tr style="text-align: left">
                                <th>Nr.</th>
                                <th>Projektname</th>
                                <th>Kunde</th>
                                <th>status</th>    
                            </tr>
                        </thead>
                    </table>

                <div id="ModalCreateProject" class="modal">
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <p>Projekt anlegen</p>
                        Projektnummer:
                        <?php
                            $query2 = mysqli_query($db, "SELECT * FROM tb_numberrange");

                            while ($row = mysqli_fetch_array($query2)) {
                                echo '<input id="projectID" value="'.$row['projectID'].'" class="wt_form-control" readonly>';
                            }

                        ?>
                        <br>
                        Projektname:
                        <input class="wt_form-control projectName" placeholder="Projektname - bitte ausfüllen" id="projectName"></input>
                        <br>
                            <!-- Text -->
                            Kundenname
                            <div >
                                <input id="customerName" name="tb_firstname" type="text" placeholder="Vor- und Nachname - bitte ausfüllen" class="wt_form-control" required="">
                            </div>
                            <br>                      

                            Straße
                            <div >
                                <input id="customerStreet" name="tb_street" type="text" placeholder="Pflichtfeld - bitte ausfüllen" class="wt_form-control">
                            </div>
                            <br>

                            Ort
                            <div >
                                <input id="customerCity" name="tb_city" type="text" placeholder="Pflichtfeld - bitte ausfüllen" class="wt_form-control">
                            </div>
                            <br>

                            PLZ
                            <div>
                                <input id="customerZIP" name="tb_zip" type="text" placeholder="Pflichtfeld - bitte ausfüllen" class="wt_form-control">
                            </div>
                            <br>
                            
                            Land
                            <div>
                                <select id="customerCountry" name="sb_country" class="wt_form-control">
                                    <option value="1">ÖSTERREICH</option>
                                    <option value="2">DEUTSCHLAND</option>
                                    <option value="3">SCHWEIZ</option>
                                </select>
                            </div>
                            <br>

                            Telefonnummer
                            <div >
                                <input id="customerPhone" name="tb_phone" type="text" placeholder="z.B.: 0664 / 1234567" class="wt_form-control">
                            </div>
                            <br>
                        
                         <br><br>                       
                        <button class="btn btn-success" id="btn_saveProject">speichern</button>

                    </div>
                </div>

                </div>            
            </div>
			<?php include '../include/footer.php'; ?>
		</div>
	</body>
    <script type="text/javascript" src="/js/intern/project_functions.js"></script>
</html>

