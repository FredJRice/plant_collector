<?php
$db = new PDO (
    'mysql:host=DB;dbname=example', 'root', 'password'
);

$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);

$query1 = $db->prepare("SELECT `common_name`, `scientific_name`, `size`, `photo`, `description`,`foliage`.`type` FROM `plants` JOIN `foliage` ON `plants`.`foliage_id` = `foliage`.`id`;");
$query1->execute();
$info = $query1->fetchAll();

//$query2 = $db->prepare("SELECT `foliage`.`type` AS 'foliage' FROM `plants`JOIN `foliage`ON `plants`.`foliage_id` = `foliage`.`id`;");
//$query2->execute();
//$info1 = $query2->fetchAll();


function displayPlant($values){
    return $values['common_name'].'<pre>'.$values['scientific_name'].'<pre>'.$values['size'].'<pre>'.$values['type'];
}
//
//function displayFoliage($values){
//    return $values['foliage'];
//foreach($info as $value) {
//    var_dump(displayPlant($value));
////    break;
//}
?>