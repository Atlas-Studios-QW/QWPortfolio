<?php
session_start();

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'u136788p130946_admin';
$DATABASE_PASS = '12345678';
$DATABASE_NAME = 'u136788p130946_Portfolio';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if (mysqli_connect_errno()) {
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

function Upload($con, $target_dir)
{
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            return "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            return "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        return "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        return "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        return "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        return "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            return "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
            $con->query("INSERT INTO HomeCards (Title, Link, ImgName) VALUES ('{$_POST['title']}', '{$_POST['link']}', '{$_FILES["fileToUpload"]["name"]}')");
        } else {
            return "Sorry, there was an error uploading your file.";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Edit</title>
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/dataEdit.css">
</head>

<body>
    <div class="container">
        <?php
            $con->query("SELECT ");
        ?>
        <form method="POST" enctype="multipart/form-data">
            <input type="text" name="title" placeholder="Title" required>
            <input type="link" name="link" placeholder="Link" required>
            <input type="file" name="fileToUpload" id="fileToUpload" required>
            <input type="submit" name="HomeCard" value="Add New Card">
        </form>

        <?php
        if (isset($_POST['HomeCard'])) {
            echo Upload($con, "../media/database/Home_");
        }
        ?>
    </div>
</body>

</html>