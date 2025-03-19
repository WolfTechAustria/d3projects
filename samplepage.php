<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
include "../include/check_login.php";
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Projektmanagement | Beispielseite</title>

        <?php include '../include/include-css_js.php'; ?>

	</head>
	<body class="loggedin">
        <?php include "../include/navigation.php";?>
		<div class="content">                           <!-- hier gehts los -->
            <div class="card">
                <div class="card-header">
                    <h2>Beispielseite</h2>
                </div>
                <div class="card-body">

               
                </div>            
            </div>
			<?php include '../include/footer.php'; ?>
		</div>
	</body>
</html>


