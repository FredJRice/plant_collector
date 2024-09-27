<?php

function connectDb(): PDO
{
    $db = new PDO (
        'mysql:host=DB;dbname=example', 'root', 'password'
    );
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
    return $db;
}

function createQuery(){
    $db = connectDb();
    $query = $db->prepare("SELECT `common_name`, `scientific_name`, `size`, `photo`, `description`,`foliage`.`type` FROM `plants` JOIN `foliage` ON `plants`.`foliage_id` = `foliage`.`id`;");
    $query->execute();
    $info = $query->fetchAll();
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

function addPlant(array $sandata, $db)
{

    $query = $db->prepare("INSERT INTO `plants` (common_name, scientific_name, size, foliage_id, description, photo) VALUES (:cname,:sname,:size,:foliage_id,:description,:photo)");
    $result = $query->execute([
        'cname' => $sandata['common_name'],
        'sname' => $sandata['scientific_name'],
        'size' => $sandata['size'],
        'foliage_id' => $sandata['foliage_id'],
        'description' => $sandata['description'],
        'photo' => $sandata['photo'],
        ]);
        return $result;
    }
