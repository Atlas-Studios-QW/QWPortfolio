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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/contact.css">
    <link rel="stylesheet" href="../css/about.css">
    <script src="../js/scripts.js"></script>
</head>

<body>
    <nav>
        <div class="logoContainer">
            <img src="../media/icons/Atlas Industries.svg" class="logo">
        </div>
        <div class="navContainer">
            <div class="navBtn"><button class="navBtnBtn" onclick="redirect('home.php')"><img class="navBtnImg" src="../media/icons/home.png"></button></div>
            <div class="navBtn"><button class="navBtnBtn" onclick="redirect('projects.php')"><img class="navBtnImg" src="../media/icons/mywork.png"></button></div>
            <div class="navBtn"><button class="navBtnBtn" onclick="redirect('about.php')"><img class="navBtnImg" src="../media/icons/about.png"></button></div>
            <div class="navBtn"><button class="navBtnBtn" onclick="redirect('contact.php')"><img class="navBtnImg" src="../media/icons/contact.png"></button></div>
        </div>
    </nav>
</body>

<footer>
    <a href="login.php">Admin Login</a>
</footer>
</html>