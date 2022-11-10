<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>
    <form method="POST">
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <input type="submit" name="Login" value="Login">
    </form>
    <?php
    session_start();
    if ($_SESSION['loggedin']) {
        include("dataEdit.php");
    }
    if (isset($_POST['Login'])) {
        include("../php/authenticate.php");
    }
    ?>
</body>

</html>