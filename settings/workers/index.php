<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
include "../include/check_login.php";
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Projektmanagement | Mitarbeiter</title>
        <?php include '../../include/include-css_js.php'; ?>

        <script type="text/javascript" src="/js/intern/settings_workers.js"></script>

	</head>
	<body class="loggedin">
        <?php include "../../include/navigation.php";?>
		<div class="content">                           <!-- hier gehts los -->
            <div class="card">
                <div class="card-header">
                    <h2>Mitarbeiterübericht</h2>
                </div>
                <div class="card-body">
                    <button id="btn_addEmployee" class="btn btn-success">Mitarbeiter hinzufügen</button>
                    <br><br>
                    <table id="workersTable" class="table display responsive nowrap" width="100%">
                        <thead>
                            <tr>
                                <td>MitarbeiterID</td>
                                <td>Vorname</td>
                                <td>Nachname</td>
                                <td>Status</td>
                                <td></td>
                            </tr>
                        </thead>
                    </table>
               
                </div>            
            </div>
			<?php include '../include/footer.php'; ?>
		</div>
	</body>
</html>


