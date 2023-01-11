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
            if (isset($_POST['HomeCard'])) {
                $con->query("INSERT INTO HomeCards (Title, Link, ImgName) VALUES ('{$_POST['title']}', '{$_POST['link']}', '{$_FILES["fileToUpload"]["name"]}')");
            } else if (isset($_POST['ContactCard'])) {
                $con->query('INSERT INTO ContactCards (Title, SubTitle, Link, ImgName) VALUES ("' . $_POST['title'] . '","' . $_POST['subTitle'] . '", "' . $_POST['link'] . '", "' . $_FILES["fileToUpload"]["name"] . '")');
            }
            return "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
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
    <script src="../js/scripts.js"></script>
</head>

<body>
    <div class="container">
        <button onclick="redirect('home.php')">Return</button>
        <h1>Cards</h1>
        <!-- HOME CARDS -->
        <h2>Home</h2>
        <?php
        $result = $con->query("SELECT * FROM HomeCards");
        echo "<form method='POST'>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "ID: " . $row['ID'] . " | Title: " . $row['Title'] . " | <input type='submit' name='RemoveHome" . $row['ID'] . "' value='Remove' /><br>";
        }
        echo "</form>";
        ?>
        <h3>New Card</h3>
        <form method="POST" enctype="multipart/form-data">
            <input type="text" name="title" placeholder="Title" required>
            <input type="link" name="link" placeholder="Link" required>
            <input type="file" name="fileToUpload" id="fileToUpload" required>
            <input type="submit" name="HomeCard" value="Add New Card">
        </form>

        <!-- CONTACT CARDS -->
        <h2>Contact</h2>
        <?php
        $result = $con->query("SELECT * FROM ContactCards");
        echo "<form method='POST'>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "ID: " . $row['ID'] . " | Title: " . $row['Title'] . " | <input type='submit' name='RemoveContact" . $row['ID'] . "' value='Remove' /><br>";
        }
        echo "</form>";
        ?>
        <h3>New Card</h3>
        <form method="POST" enctype="multipart/form-data">
            <input type="text" name="title" placeholder="Title" required>
            <input type="text" name="subTitle" placeholder="Subtitle" required>
            <input type="link" name="link" placeholder="Link" required>
            <input type="file" name="fileToUpload" id="fileToUpload" required>
            <input type="submit" name="ContactCard" value="Add New Card">
        </form>

        <!-- ABOUT ME POSTS -->
        <h2>Posts</h2>
        <?php
        $result = $con->query("SELECT * FROM Posts");
        echo "<form method='POST'>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "ID: " . $row['ID'] . " | Title: " . $row['Title'] . " | <input type='submit' name='RemovePost" . $row['ID'] . "' value='Remove' /><br>";
        }
        echo "</form>";
        ?>
        <h3>New Card</h3>
        <form method="POST" enctype="multipart/form-data">
            <input type="text" name="title" placeholder="Title" required>
            <input type="text" name="description" placeholder="Description" required>
            <textarea name="content" required>Content</textarea>
            <input type="submit" name="Post" value="Add New Card">
        </form>

        <!-- PROJECTS -->
        <h2>Projects</h2>
        <?php
        $result = $con->query("SELECT * FROM Projects");
        echo "<form method='POST'>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "ID: " . $row['ID'] . " | Title: " . $row['Title'] . " | <input type='submit' name='RemoveProject" . $row['ID'] . "' value='Remove' /><br>";
        }
        echo "</form>";
        ?>
        <h3>New Card</h3>
        <form method="POST" enctype="multipart/form-data">
            <input type="text" name="title" placeholder="Title" required>
            <textarea name="description" required placeholder="Description"></textarea>
            <input type="submit" name="Project" value="Add New Card">
        </form>

        <!-- CHANGELOGS -->
        <h2>Changelogs</h2>
        <?php
        $result = $con->query("SELECT * FROM ChangeLogs");
        echo "<form method='POST'>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "ID: " . $row['ID'] . " | Title: " . $row['Title'] . " | <input type='submit' name='RemoveChangelog" . $row['ID'] . "' value='Remove' /><br>";
        }
        echo "</form>";
        ?>
        <h3>New Card</h3>
        <form method="POST" enctype="multipart/form-data">
            <input type="number" name="projectID" placeholder="Project ID" required>
            <input type="text" name="title" placeholder="Title" required>
            <textarea name="description" required placeholder="Description"></textarea>
            <div id="changeInputs"></div>
            <button type="button" onclick="addChangeInput()">Add Item</button>
            <input type="submit" name="Changelog" value="Add New Card">
        </form>



        <?php
        if (isset($_POST)) {
            $Key0 = array_keys($_POST)[0];
            if (strpos($Key0, 'Remove') !== false) {
                if (strpos($Key0, 'Home') !== false) {
                    $ID = str_replace("RemoveHome", "", $Key0);
                    $con->query("DELETE FROM HomeCards WHERE ID = " . $ID);
                    $FileName = $con->query("SELECT ImgName FROM HomeCards WHERE ID = " . $ID);
                    unlink("../media/database/home/" . $FileName);
                } else if (strpos($Key0, "Contact") !== false) {
                    $ID = str_replace("RemoveContact", "", $Key0);
                    $con->query("DELETE FROM ContactCards WHERE ID = " . $ID);
                    $FileName = $con->query("SELECT ImgName FROM ContactCards WHERE ID = " . $ID);
                    unlink("../media/database/contact/" . $FileName);
                } else if (strpos($Key0, "Post") !== false) {
                    $ID = str_replace("RemovePost", "", $Key0);
                    $con->query("DELETE FROM Posts WHERE ID = " . $ID);
                } else if (strpos($Key0, "Project") !== false) {
                    $ID = str_replace("RemoveProject", "", $Key0);
                    $con->query("DELETE FROM Projects WHERE ID = " . $ID);
                } else if (strpos($Key0, "Changelog") !== false) {
                    $ID = str_replace("RemoveChangelog", "", $Key0);
                    $con->query("DELETE FROM Changelogs WHERE ID = " . $ID);
                }
            } else {
                if (isset($_POST['HomeCard'])) {
                    echo Upload($con, "../media/database/home/");
                } else if (isset($_POST['ContactCard'])) {
                    echo Upload($con, "../media/database/contact/");
                } else if (isset($_POST['Post'])) {
                    $con->query("INSERT INTO Posts (Title, Description, content) VALUES ('" . $_POST['title'] . "','" . $_POST['description'] . "','" . $_POST['content'] . "')");
                } else if (isset($_POST['Project'])) {
                    $con->query("INSERT INTO Projects (Title, Description) VALUES ('" . $_POST['title'] . "','" . $_POST['description'] ."')");
                } else if (isset($_POST['Changelog'])) {
                    $con->query("INSERT INTO Changelogs (ProjectID, Title, Description) VALUES ('" . $_POST['projectID'] ."','" . $_POST['title'] . "','" . $_POST['description'] . "')");
                }
            }
            echo "<script>window.history.replaceState( null, null, window.location.href );</script>";
        }

        ?>
    </div>
</body>

</html>