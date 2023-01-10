<?php
include("../php/include.php");

$projectID = $_GET["projectID"];

$projectData = mysqli_fetch_assoc($con->query("SELECT * FROM Projects WHERE ID = ".$projectID));

?>

<link rel="stylesheet" href="../css/projectView.css">
<title></title>

<div class="content">
    <div class="PJbody">
        <div class="PJhead">
            <h1>Title</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad quam dolor illo sed laborum illum blanditiis possimus corporis architecto id aliquam commodi molestiae, velit quisquam unde pariatur, non temporibus? Eos saepe quas repellendus quos blanditiis ipsam id excepturi cumque nihil veritatis totam sapiente suscipit numquam, nemo pariatur maxime corporis magnam dolorem dignissimos harum esse? Autem qui vel fugiat eaque nesciunt consectetur iure ut nemo illum veritatis, sint tempore ab deserunt recusandae deleniti perspiciatis hic quas delectus dolore quae eos. Vero inventore, enim numquam id autem, quis cupiditate impedit tempore accusantium est beatae velit quisquam ducimus repellendus obcaecati excepturi accusamus iusto.</p>
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
            <div class="CLcard">
                <h1 class="CLtitle">Title</h1>
                <h1 class="CLdate">01-01-2023</h1>
                <p class="CLdescription">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Molestiae nobis doloremque necessitatibus ut, perferendis esse voluptatem in aspernatur facilis at animi eaque laborum atque adipisci maiores provident corporis, officiis dolorum ea, odit rem ratione? Nulla odio quo rerum! Sunt, earum obcaecati nam, eaque eum molestias cumque laboriosam vitae itaque commodi beatae ut animi fuga, consequuntur rerum quibusdam unde officia recusandae? Quibusdam nihil, iusto animi alias harum ex delectus autem fugit corrupti culpa. Veritatis modi, optio quasi quas, iste omnis esse mollitia animi alias perferendis commodi rerum consectetur autem corrupti quod reiciendis maiores eveniet. Dolore cumque rerum praesentium, odit iusto ducimus?</p>
                <ul class="CLlist">
                    <li>1</li>
                    <li>2</li>
                    <li>3</li>
                    <li>4</li>
                </ul>
            </div>
        </div>
        <div class="PJside">
    
        </div>
    </div>
</div>