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
		<title>Projektmanagement | Dashboard</title>
        <link rel="stylesheet" href="/css/wt_style.css">

        
        <script src="/js/extern/jquery.min.js"></script>     <!-- jQuery library -->
        <script src="/js/extern/jquery3.7.1.js"></script>     <!-- jQuery library -->

        <script src="https://kit.fontawesome.com/6a831aa4b1.js" crossorigin="anonymous"></script>

	</head>
	<body class="loggedin">
        <?php include "../include/navigation.php";?>
		<div class="content">                           <!-- hier gehts los -->
            <div class="card">
                <div class="card-header">
                    <h2>Dashboard</h2>
                </div>
                <div class="card-body">

               
                </div>            
            </div>
			<?php include '../include/footer.php'; ?>
		</div>
	</body>
</html>


