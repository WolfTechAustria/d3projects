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

		<title>Projektmanagement | Artikel</title>
        <link rel="stylesheet" href="/css/wt_style.css">
        <link rel="stylesheet" href="/css/extern/dataTables.dataTables.min.css">

        <link type="text/css" rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" />

        <script src="/js/extern/jquery.min.js"></script>     <!-- jQuery library -->
        <script src="/js/extern/jquery3.7.1.js"></script>     <!-- jQuery library -->
        <script src="/js/extern/dataTables.min.js"></script>

        <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
        <script src="/js/extern/fontawesome.js" crossorigin="anonymous"></script>

        <script type="text/javascript" src="/js/intern/article_functions.js"></script>


	</head>
	<body class="loggedin">
        <?php include "../include/navigation.php";?>
		<div class="content">                           <!-- hier gehts los -->
            <div class="card">
                <div class="card-header">
                    <h2>Artikelübersicht</h2>
                </div>
                <div class="card-body">
                
                    <button id="opn_ModalCreateArticle" class="btn btn-info">Artikel anlegen</button>

                    <br><br>
                    <table id="articleTable" class="table display responsive nowrap" width="100%">
                        <thead>
                            <tr style="text-align: left">
                                <th>Artikelnummer</th>
                                <th>Name</th>
                                <th>EK netto</th>
                                <th>VK netto</th>
                                <th></th>
                            </tr>
                        </thead>
                    </table>

                <?php include "../include/modal_addArticle.php"?>
                </div>            
            </div>
			<?php include '../include/footer.php'; ?>
		</div>
	</body>
    <script type="text/javascript" src="/js/intern/article_modal.js"></script>
</html>


