<?php


//Create function to initiate connection with database and create query

function connectDb()
{
    $db = new PDO (
        'mysql:host=DB;dbname=example', 'root', 'password'
    );
    return $db;
}

function createQuery(){
    $db = connectDb();
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);

    $query1 = $db->prepare("SELECT `common_name`, `scientific_name`, `size`, `photo`, `description`,`foliage`.`type` FROM `plants` JOIN `foliage` ON `plants`.`foliage_id` = `foliage`.`id`;");
    $query1->execute();
    $info = $query1->fetchAll();
    return $info;
}

function displayPlant(){
        $infos ="";
    foreach(createQuery() as $value) {
        $infos .= "<div>".$value['common_name'] . '<br>' . $value['scientific_name'] . '<br>' . $value['size'] . '<br>' . $value['type']."</div>";
    }
        return $infos;
}
