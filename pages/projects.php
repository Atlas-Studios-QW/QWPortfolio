<?php
include("../php/include.php");

$projects = $con->query("SELECT * FROM Projects");
?>

<link rel="stylesheet" href="../css/projects.css">
<title>My Work</title>

<div class="content">
    <div class="PJcontainer">
        <?php

        while ($project = mysqli_fetch_assoc($projects)) {
            echo "
            <div class='PJcard'>
                <div class='PJimg'>
                <img src='../media/database/projects/" . $project['ID'] . "/0.png'>
                </div>
                <div class='PJtitle'>
                    <h2>" . $project['Title'] . "</h2>
                </div>
                <p class='PJdescription'>" . $project['Title'] . "</p>
                <button class='PJbtn PJreadmore' onclick='redirect(`projectView.php?projectID=" . $project['ID'] . "`)'>Find out more!</button>
                <button class='PJbtn PJexternal' onclick='redirect('atlas-h.itch.io')'>External Link</button>
            </div>";
        }

        ?>
    </div>
</div>