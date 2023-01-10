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
                <a href="#">Link1</a><br>
                <a href="#">Link2</a><br>
                <a href="#">Link3</a><br>
            </div>
        </div>
        <div class="PJmain">
            <h1>Change logs</h1>
            <div class="CLcard">
                
            </div>
        </div>
        <div class="PJside">
    
        </div>
    </div>
</div>