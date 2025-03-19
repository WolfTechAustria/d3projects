<?php
session_start();
// Change this to your connection info.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'DBAdmin';
$DATABASE_PASS = '3v0E@bd71!!';
$DATABASE_NAME = 'd3_projects';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// Now we check if the data from the login form was submitted, isset() will check if the data exists.
if ( !isset($_POST['username'], $_POST['password']) ) {
	// Could not get the data that should have been sent.
	exit('Please fill both the username and password fields!');
}

// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $con->prepare('SELECT ID, password, enabled, function, employeeID, username FROM tb_user WHERE username = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password, $enabled, $function, $employeeID, $username);
        $stmt->fetch();
        // Account exists, now we verify the password.
        // Note: remember to use password_hash in your registration file to store the hashed passwords.
        if (password_verify($_POST['password'], $password)) {
            // Verification success! User has logged-in!
            // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $username;
            $_SESSION['ID'] = $id;
            $_SESSION['function'] = $function;
            $_SESSION['employeeID'] = $employeeID;
            if($enabled == '1'){
                header('Location: /dashboard/index.php');
            }
            else{
                echo 'Benutzerkonto noch nicht freigeschaltet!';
            }
        } else {
            // Incorrect password
            echo 'Falscher Benutzername oder Passwort!';
        }
    } else {
        // Incorrect username
        echo 'Falscher Benutzername oder Passwort!';
    }

	$stmt->close();
}
?>