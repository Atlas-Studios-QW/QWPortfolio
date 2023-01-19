<?php
include("../php/include.php");

$Post = mysqli_fetch_array($con->query("SELECT * FROM Posts WHERE ID = ". $_GET['postID']));
?>

<link rel="stylesheet" href="../css/about.css">
<title>Post</title>

<div id="content" class="content">
    <div class="post">
        <h1 class="postTitle"><?php echo $Post['Title']; ?></h1>
        <h3 style="color: var(--text);" class="postDescription"><?php echo $Post['Description']; ?></h3>
        <p><?php echo $Post['Content']; ?></p>
    </div>
</div>

<script>
    window.location.href = "#content";
</script>