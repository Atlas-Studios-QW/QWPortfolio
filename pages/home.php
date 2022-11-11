<?php
include("../php/include.php");
?>

<link rel="stylesheet" href="../css/home.css">
<title>Home</title>

<div class="content">
    <div id="cardsContainer" class="cardsContainer">
        <?php
        $result = $con->query("SELECT * FROM HomeCards");
        while ($row = mysqli_fetch_assoc($result)) {
            echo '
            <button class="card" onclick="redirect(`'.$row['Link'].'`)">
                <img class="cardBackground" src="../media/database/home/'.$row['ImgName'].'">
                <div class="cardTitle">
                    <h2>'.$row['Title'].'</h2>
                    <div class="cardBtn"><img src="../media/icons/hexagonGo.png"></div>
                </div>
            </button>';
        }
        ?>
    </div>
</div>