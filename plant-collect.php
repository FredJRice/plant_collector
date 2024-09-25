<?php
$db = new PDO (
    'mysql:host=DB;dbname=example', 'root', 'password'
);

$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);

$query1 = $db->prepare("SELECT `common_name`, `scientific_name`, `foliage`, `size`, `photo`, `description` FROM `plants`");
$query1->execute();
$info = $query1->fetchAll();

function displayPlant($values){
    return $values['common_name'].$values['scientific_name'].$values['foliage'].$values['size'];
}
foreach($info as $value) {
    var_dump(displayPlant($value));
    break;
}
?>