<?php
require_once 'plant-collect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Plant Collector</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="modern-normalize.css">
    <link rel="stylesheet" href="plant-collect.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<nav class="pnavbar">
    <div class="navbar">
        <h1 class="title">Plant Collector</h1>
    </div>
</nav>
<div class="spacer"></div>
<section class="sectionplant">
    <form action = "index.php" method = "POST">
        <input type = "text" name ="common_name" placeholder ="Common name:">
        <br>
        <br>
        <input type = "text" name ="scientific_name" placeholder = "Scientific name:">
        <br>
        <br>
        <input type = "text" name ="size" placeholder = "Size:">
        <br>
        <br>
        <input type = "text" name ="foliage" placeholder = "Foliage:">
        <br>
        <br>
        <textarea type = "comment" name ="description" placeholder = "Description:"></textarea>
        <br>
        <br>
        <input type = "text" name ="photo" placeholder = "Photo path:">
        <br>
        <br>
        <input type = "submit">
    </form>

<!--    <footer class="footer">© Fred Rice 2024</footer>-->
</section>

</body>
</html>
