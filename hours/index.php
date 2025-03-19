<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
include "../include/check_login.php";
?>

<!DOCTYPE html>
<html>
	<head>
        <?php include "../include/meta.php";?>

		<title>Projektmanagement | Stundenübersicht</title>
        
        <link rel="stylesheet" href="/css/wt_style.css">
        <link rel="stylesheet" href="/css/extern/dataTables.dataTables.min.css">

        <link type="text/css" rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" />

        <script src="/js/extern/jquery.min.js"></script>     <!-- jQuery library -->
        <script src="/js/extern/jquery3.7.1.js"></script>     <!-- jQuery library -->
        <script src="/js/extern/dataTables.min.js"></script>

        <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
        <script src="/js/extern/fontawesome.js" crossorigin="anonymous"></script>

        <script type="text/javascript" src="/js/intern/hours_functions.js"></script>
	</head>
	<body class="loggedin">
        <?php include "../include/navigation.php";?>
		<div class="content">                           <!-- hier gehts los -->
            <div class="card">
                <div class="card-header">
                    <h2>Stundenübersicht</h2>
                </div>
                <div class="card-body">
                    
                    <table id="hoursTable">
                        <thead>
                            <tr>
                                <td>Datum</td>
                                <td>Mitarbeiter</td>
                                <td>Stunden</td>
                                <td>von</td>
                                <td>bis</td>
                                <td>Arbeitsbeschreibung</td>
                                <td>Projekt</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
               
                </div>            
            </div>
			<?php include '../include/footer.php'; ?>
		</div>
	</body>
</html>


