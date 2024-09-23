<?php

$db = new PDO (
    'mysql:host=DB;dbname=example', 'root', 'password'
);

//$id = $_GET['id'];

$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
//$query = $db->prepare("SELECT `common_name` FROM `Plants-2` WHERE `id` = :placeholder;");
$query = $db->prepare("SELECT `common_name` FROM `plants` WHERE `common_name` = 'Purple Top'");
$result = $query->execute();


if ($result){
    $plants = $query->fetchAll();
    echo"<pre>";
    var_dump($plants);
}else{
    echo "Oops";
}
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
    <!--All metadata here-->
</head>
<body>
<nav class="pnavbar">
    <div class="navbarleft">
        <a href="#info"><h1 class="title">Plant Collector</h1></a>
    </div>

</nav>
<div id="info" class="spacer"></div>

<section id="plant" class="sectionplant">
        <div id="one" class="plant"><h3></h3>
            <?php
            var_dump($result);
            ?>
            <div class="info"></div>
            <div class="photo"></div>
            <div class="description"></div>
        </div>
        <div id="two" class="plant"><h3>Plant 2</h3></div>
        <div id="three" class="plant"><h3>Plant 3</h3></div>
        <div id="four" class="plant"><h3>Plant 4</h3></div>
        <div id="five" class="plant"><h3>Plant 5</h3></div>
        <div id="six" class="plant"><h3>Plant 6</h3></div>
</section>

<footer class="footer">© Fred Rice 2024</footer>
</body>
</html>
