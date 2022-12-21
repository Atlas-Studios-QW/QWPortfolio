<?php
include("../php/include.php");
?>

<link rel="stylesheet" href="../css/home.css">
<title>Atlas Industries</title>
<div class="content">
    <h2 class="description">
        Heya! Welcome to my portfolio! My name is Quillan Wielhouwer. I am a student studying software development in Rotterdam and I'm trying to get into game development. I already have a couple projects so if you have some time, please check them out! You can find all of my uploaded work on the <a href="projects.php">My Projects</a> page.
    </h2>

    <div id="cardsContainer" class="cardsContainer">
        <?php
        $result = $con->query("SELECT * FROM HomeCards");
        while ($row = mysqli_fetch_assoc($result)) {
            echo '
                    <button class="card" onclick="redirect(`' . $row['Link'] . '`)">
                        <img class="cardBackground" src="../media/database/home/' . $row['ImgName'] . '" alt="Info Card">
                        <div class="cardTitle">
                            <h2>' . $row['Title'] . '</h2>
                            <div class="cardBtn"><img src="../media/icons/hexagonGo.png" alt="' . $row['Title'] . '"></div>
                        </div>
                    </button>';
        }
        ?>
    </div>
</div>