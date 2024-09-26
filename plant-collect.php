<?php
function connectDb()
{
    $db = new PDO (
        'mysql:host=DB;dbname=example', 'root', 'password'
    );
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
    return $db;
}

function createQuery(){
    $db = connectDb();
    $query1 = $db->prepare("SELECT `common_name`, `scientific_name`, `size`, `photo`, `description`,`foliage`.`type` FROM `plants` JOIN `foliage` ON `plants`.`foliage_id` = `foliage`.`id`;");
    $query1->execute();
    $info = $query1->fetchAll();
    return $info;
}

function displayPlant(array $query){
    $infos ="";
    foreach($query as $value) {
        $size = '';
        if (isset($value['size']) ) {
            $size = $value['size'] ?? '';
        }
        $type = '';
        if (isset($value['type']) ) {
            $type = $value['type'] ?? '';
        }
        $description = '';
        if (isset($value['description']) ) {
            $description = $value['description'] ?? '';
        }
        $photo = '';
        if (isset($value['photo']) ) {
            $photo = $value['photo'] ?? '';
        }
        $infos .=   "<div class='plant'>".
                    "<div>".$value['common_name'].
                    '<br>'.'<br>'.$value['scientific_name'].
                    '<br>'.'<br>'.$size.
                    '<br>'.'<br>'.$type.
                    "</div>".
                    "<div class = 'describe'>".$description.
                    "</div>".
                    "<div class = 'photo'><img src =".$photo.">".
                    "</div>".
                    "</div>";
    }
    return $infos;
}

function addPlant($newPlant){

}
