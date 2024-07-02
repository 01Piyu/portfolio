<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .admin-panel {
            display: flex;
        }

        .sidebar {
            width: 200px;
            background-color: #f8f8f8;
            padding: 20px;
            border-right: 1px solid #ddd;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar ul li {
            margin-bottom: 10px;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: #333;
            display: block;
            padding: 10px;
            border-radius: 4px;
        }

        .sidebar ul li a:hover,
        .sidebar ul li a.active {
            background-color: #ddd;
        }

        .main-content {
            padding: 20px;
            flex-grow: 1;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }
    </style>
</head>
<body>
    <div class="admin-panel">
        <div class="sidebar">
            <ul>
                <li><a href="#home" class="tab-link" onclick="openTab(event, 'Home')">Home</a></li>
                <li><a href="#gallery" class="tab-link" onclick="openTab(event, 'Gallery')">Gallery</a></li>
            </ul>
        </div>
        <div class="main-content">
            <div id="Home" class="tab-content">
                <h2>Home</h2>
                <form id="homeForm" method="post">
                    <label for="title">Title:</label>
                    <input type="text" id="title" name="title" required><br><br>
                    <label for="description">Description:</label>
                    <textarea id="description" name="description" required></textarea><br><br>
                    <button type="submit" name="home">Update</button>
                </form>
            </div>
            <div id="Gallery" class="tab-content">
                <h2>Gallery</h2>
                <form id="galleryForm" method="post" enctype="multipart/form-data">
                    <label for="fileUpload">Upload Files:</label>
                    <input type="file" id="fileUpload" name="image" multiple><br><br>
                    <button type="submit" name="submit">Upload</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelector('.tab-link').click();
        });

        function openTab(event, tabName) {
            var i, tabContent, tabLinks;
            
            tabContent = document.getElementsByClassName("tab-content");
            for (i = 0; i < tabContent.length; i++) {
                tabContent[i].style.display = "none";
            }
            
            tabLinks = document.getElementsByClassName("tab-link");
            for (i = 0; i < tabLinks.length; i++) {
                tabLinks[i].className = tabLinks[i].className.replace(" active", "");
            }
            
            document.getElementById(tabName).style.display = "block";
            event.currentTarget.className += " active";
        }
    </script>
</body>
</html>
<?php
include 'connect.php';

// Handle image upload
if (isset($_POST['submit'])) {
  if (isset($_FILES['image'])) {
    $image = $_FILES['image'];
    $fileName = $image['name'];
    $size = $image['size'];
    $fileTemp = $image['tmp_name'];
    $type = $image['type'];
    echo "<br>";
    $size_converted = $size / 1048576;
    $date = date("Y-m-d-H-i-s");

    $extension = pathinfo($image["name"], PATHINFO_EXTENSION);
    $newfilename = $date . "." . $extension;
    if ($type == "image/jpeg" || $type == "image/png" || $type == "image/jpg") {
      if ($size_converted < 5) {
        move_uploaded_file($fileTemp, 'image/' . $newfilename);
        $query = "INSERT INTO image(image_name) VALUES('$newfilename')";
        $res = mysqli_query($conn, $query);
        echo "File uploaded successfully";
      } else {
        die("Error: File is too large");
      }
    } else {
      die("Error: File is not supported");
    }
  } else {
    echo "No files";
  }
}

// Handle home update
if (isset($_POST['home'])) {
    
  $title = ($_POST['title']);
  $description = ($_POST['description']);
  $query2 = "UPDATE about_us SET title = '$title', description = '$description' WHERE id = 1;";
  $hom = mysqli_query($conn, $query2);
}
?>