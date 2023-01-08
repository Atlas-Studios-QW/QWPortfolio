<?php
include("../php/include.php");

$Posts = $con->query("SELECT * FROM Posts");
?>

<link rel="stylesheet" href="../css/about.css">
<title>About</title>

<div class="content">
    <div class="aboutMe">
        <h1>About Me</h1>
        <h4>Let me introduce myself. My name is Quillan Wielhouwer, I'm a student in the Netherlands interested in programming, specifically game development.</h4>
        <p></p>
    </div>
    <h1 class="postsTitle">Posts</h1>

    <div class="posts">
    <?php
    while ($Post = mysqli_fetch_assoc($Posts)) {
        echo "<a href='postView.php?postID=".$Post['ID']."' class='postCard'>
            <h1>".$Post['Title']."</h1>
            <h4>".$Post['Description']."</h4>
            <p>Read More!</p>
        </a>";
    }
    ?>
    </div>
</div>