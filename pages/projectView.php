<?php
include("../php/include.php");

$projectID = $_GET["projectID"];

$projectData = mysqli_fetch_assoc($con->query("SELECT * FROM Projects WHERE ID = " . $projectID));

$changelogs = $con->query("SELECT * FROM Changelogs WHERE ProjectID = " . $projectID);

?>

<link rel="stylesheet" href="../css/projectView.css">
<title></title>

<div class="content">
    <div class="PJbody">
        <div class="PJhead">
            <h1><?= $projectData['Title'] ?></h1>
            <p><?= $projectData['Description'] ?></p>
            <h1>Find out more!</h1>
            <div class="PJlinks">
                <div class="DownloadLinks">
                    <a href="#">Download <br> Windows</a>
                    <a href="#">Download <br> Mac</a>
                </div>
                <div class="ExternalLinks">
                    <a href="#">External Link</a>
                    <a href="#">External Link</a>
                    <a href="#">External Link</a>
                    <a href="#">External Link</a>
                    <a href="#">External Link</a>
                    <a href="#">External Link</a>
                    <a href="#">External Link</a>
                </div>
            </div>
        </div>
        <div class="PJmain">
            <h1>Changelogs</h1>
            <?php
            while ($log = mysqli_fetch_assoc($changelogs)) {
                $date = new DateTimeImmutable($log['Date']);
                date_format($date, 'd-m-Y');
                echo "
                <div class='CLcard'>
                <h1 class='CLtitle'>".$log['Title']. "</h1>
                <h1 class='CLdate'>" . $date . "</h1>
                <p class='CLdescription'>" . $log['Description'] . "</p>
                <ul class='CLlist'>
                </ul>
                </div>
                ";
            }
            ?>
        </div>
        <div class="PJside">

        </div>
    </div>
</div>