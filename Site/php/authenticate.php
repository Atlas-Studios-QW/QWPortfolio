<?php
    session_start();

    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'u136788p130946_admin';
    $DATABASE_PASS = '12345678';
    $DATABASE_NAME = 'u136788p130946_Portfolio';
    
    $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
    
    if ( mysqli_connect_errno() ) {
        exit('Failed to connect to MySQL: ' . mysqli_connect_error());
    }

if ( !isset($_POST['username'], $_POST['password']) ) {
	exit('Please fill both the username and password fields!');
}

if ($stmt = $con->prepare('SELECT ID, Password FROM Users WHERE Username = ?')) {
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	$stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($userID, $userPassword);
        $stmt->fetch();

        if (password_verify($_POST['password'], $userPassword)) {
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST['username'];
            $_SESSION['id'] = $userID;
            header('Location: ../pages/dataEdit.php');
        } else {
            echo '<h3>Incorrect username and/or password!</h3>';
        }
    } else {
        echo '<h3>Incorrect username and/or password!</h3>';
    }

	$stmt->close();
}
