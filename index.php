<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
		<title>Login</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <link href="/css/login.css" rel="stylesheet" type="text/css">
        <link href="/css/wt_style.css" rel="stylesheet" type="text/css">

	<link rel="shortcut icon" href="/images/logo/logo_steinzeit.png" />
	<link rel="apple-touch-icon" href="/images/logo/logo_steinzeit.png" />
	<link rel="apple-touch-icon" sizes="72x72" href="/images/logo/logo_steinzeit.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="/images/logo/logo_steinzeit.png" />
	<link rel="apple-touch-icon" sizes="144x144" href="/images/logo/logo_steinzeit.png" />
	<link rel="apple-touch-icon-precomposed" href="/images/logo/logo_steinzeit.png"/>


	</head>
	<body style="background-color:black">
        <img src="/images/logo/logo_steinzeit.png" style="display: block; margin-left:auto; margin-right:auto"/>
		<div class="login">
			<h1>Login</h1>
			<form action="authenticate.php" method="post">
				<label for="username">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="username" placeholder="Username" id="username" required>
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password" placeholder="Password" id="password" required>
				<input type="submit" value="Anmelden">
			</form>
            <a href="/register"><button class="btn-info" href="/register">jetzt Registrieren</button></a>
		</div>
	</body>
</html>