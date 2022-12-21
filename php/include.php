<?php
session_start();

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'u136788p130946_admin';
$DATABASE_PASS = '12345678';
$DATABASE_NAME = 'u136788p130946_Portfolio';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if (mysqli_connect_errno()) {
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Quillan Wielhouwer">
    <meta name="keywords" content="Atlas Industries, atlasindustries, Atlas, Developer, Website, Quillan, Quillan Wielhouwer, Wielhouwer">
    <meta name="description" content="Portfolio of Quillan Wielhouwer, a starting game developer and student.">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="icon" type="image/x-icon" href="../media/icons/favicon.ico">
    <script src="../js/scripts.js"></script>
    <title>Atlas Industries</title>
</head>

<body>
    <h1 style="display:none;">Atlas Industries, Portfolio Quillan Wielhouwer</h1>
    <nav>
        <div class="logoContainer">
            <img src="../media/icons/Atlas Industries.svg" class="logo" alt="Atlas Industries">
        </div>
        <div class="navContainer">
            <div class="navBtn"><button class="navBtnBtn" onclick="redirect('home.php')"><img class="navBtnImg" src="../media/icons/home.png" alt="Atlas Industries Home"></button></div>
            <div class="navBtn"><button class="navBtnBtn" onclick="redirect('projects.php')"><img class="navBtnImg" src="../media/icons/mywork.png" alt="Atlas Industries My Work"></button></div>
            <div class="navBtn"><button class="navBtnBtn" onclick="redirect('about.php')"><img class="navBtnImg" src="../media/icons/about.png" alt="Atlas Industries About"></button></div>
            <div class="navBtn"><button class="navBtnBtn" onclick="redirect('contact.php')"><img class="navBtnImg" src="../media/icons/contact.png" alt="Atlas Industries Contact"></button></div>
        </div>
    </nav>
</body>

<footer>
    <a href="login.php">Admin Login</a>
</footer>

</html>