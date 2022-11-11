<?php
include("../php/include.php");
?>
<title>Home</title>

<div class="content">
    <div id="cardsContainer" class="cardsContainer">
        <?php
        $result = $con->query("SELECT * FROM HomeCards");
        while ($row = mysqli_fetch_assoc($result)) {
            echo '
            <button class="card" onclick="redirect(`'.$row['Link'].'`)">
                <img class="cardBackground" src="../media/database/Home_'.$row['ImgName'].'">
                <div class="cardTitle">
                    <h2>'.$row['Title'].'</h2>
                    <div class="cardBtn"><img src="../media/icons/hexagonGo.png"></div>
                </div>
            </button>';
        }
        ?>
    </div>
</div>