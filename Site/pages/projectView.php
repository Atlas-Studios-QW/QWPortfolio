<?php
include("../php/include.php");

$projectID = $_GET["projectID"];

$projectData = mysqli_fetch_assoc($con->query("SELECT * FROM Projects WHERE ID = " . $projectID));

$downloads = json_decode($projectData['Links'])[0];
$links = json_decode($projectData['Links'])[1];

$changelogs = $con->query("SELECT * FROM Changelogs WHERE ProjectID = " . $projectID);

?>

<link rel="stylesheet" href="../css/projectView.css">
<title></title>

<div class="content">
    <div class="PJbody">
        <div class="PJhead">
            <h1><?= $projectData['Title'] ?></h1>
            <p><?= $projectData['Description'] ?></p>
            <?php if (count($downloads) > 0) {
                echo "<h1>Downloads</h1>";
            } ?>
            <div class="PJlinks">
                <div class="DownloadLinks">
                    <?php
                    foreach ($downloads as $link) {
                        echo "<a href=" . $link[1] . ">" . $link[0] . "</a>";
                    }
                    ?>
                </div>
                <?php if (count($links) > 0) {
                    echo '<h1 style="color: var(--accent2); font-family: GoodTimes; border-bottom: solid var(--accent2);">Other Links</h1>';
                } ?>
                <div class="ExternalLinks">
                    <?php
                    foreach ($links as $link) {
                        echo "<a href=" . $link[1] . ">" . $link[0] . "</a>";
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="PJmain">
            <?php if ($changelogs->num_rows > 0) {
                echo "<h1>Changelogs</h1>";
            } ?>
            <?php
            while ($log = mysqli_fetch_assoc($changelogs)) {
                $date = DateTime::createFromFormat('Y-m-d', $log['Date']);
                $date = $date->format('d-m-Y');
                $changes = json_decode($log['Changes']);
                if (count($changes) == 0) {
                    $changesText = "";
                } else {
                    $changesText = "<li>" . implode("</li><li>", $changes) . "</li>";
                }
                echo "
                <div class='CLcard'>
                <h2 class='CLtitle'>" . $log['Title'] . "</h2>
                <h2 class='CLdate'>" . $date . "</h2>
                <p class='CLdescription'>" . $log['Description'] . "</p>
                <ul class='CLlist'>$changesText</ul>
                </div>
                ";
            }
            ?>
        </div>
        <div class="PJside">
            <?php
            $imgID = 0;
            while (file_exists("../media/database/projects/$projectID/$imgID.png")) {
                echo "<img src='../media/database/projects/$projectID/$imgID.png' alt='" . $projectData['Title'] . "'>";
                $imgID++;
            }
            ?>
        </div>
    </div>
</div>