<?php
function connectDb()
{
    $db = new PDO (
        'mysql:host=DB;dbname=example', 'root', 'password'
    );
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
    return $db;
}

function createQuery($db){

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

function addPlant($db)
{
    $cname = $_POST['common_name'];
    $sname = $_POST['scientific_name'];
//    $size = $_POST['size'];
//    $foliage = $_POST['foliage'];
//    $description = $_POST['description'];
//    $photo = $_POST['photo'];
    $query = $db->prepare("INSERT INTO `plants` (common_name, scientific_name) VALUES (:cname,:sname)");
    $result = $query->execute([
        'cname' => $_POST['common_name'],
        'sname' => $_POST['scientific_name'],
    ]);
    return $result;
}
//    if (isset($user_found['username'])){
//        echo "User {$_POST['username']} found!!";
//        echo "<br>";
//
//        $passwords_match = password_verify(£_POST['password'], $user_found['password']);
//        if ($passwords_match){
//            echo "Passwords match!";}
//    }else {
//    $query = $db->prepare('SELECT `common_name` FROM `plants` WHERE `username`=:username');
//    $query->execute(['username' => $_POST['username']]);
//    $user_found = $query->fetch();