<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photographer Portfolio</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="about.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav class="navbar">
        <div class="container">
            <div class="logo-wrapper">
                <a class="logo" href="index.html"> <strong>JV</strong> Jack Venilli </a>
            </div>

            <ul class="navbar-links">
                <li class="nav-item"><a class="nav-link active" href="home.html">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="about.html">About</a></li>
                <li class="nav-item"><a class="nav-link" href="service.html">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="workgallery.html">Works</a></li>
                <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
            </ul>
        </div>
    </nav>

<section class="gallery bg-dark" id="works">
    <div class="heading">
        <h2 class="title">My Works</h2>
    </div>
    <div class="container">
        <ul>
            
        </ul>
    </div>
    <div class="container">
        <div class="grid-wrapper">
            <div class="image tall">
            <?php
            include 'connect.php';
            $query = "SELECT image_name FROM image";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    
                    echo '<img src="image/' . $row['image_name'] . '" alt="Image">';
                    
                }
            } else {
                echo '<p>No images found in the database.</p>';
            }
        ?>
            </div>
           
     
   

        </div>
    </div>
</section>