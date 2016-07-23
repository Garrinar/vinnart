<?php
ini_set('display_errors', 0);

if (!$_GET['page']) {
    header( 'Refresh: 0; url=/t.php?lang=ua&page=oformlenja' );
}
include 'GTools/gfiledb.php';
$dbUrl = 'db/'.$_GET['lang'].'/'.$_GET['page'].'.json';
//$dbUrl = 'db/'.$_GET['lang'].'/'.$_GET['page'].'.php';
$gFileDB = new GFileDB($dbUrl);
$db = $gFileDB->data;

array_unshift($db['images'], [
	'title' => '&nbsp;',
	'images' => [
		'/img/230716/im2bOPCFNys.jpg',
		'/img/230716/jp5nnZmyQ1A.jpg',
		'/img/230716/MzVHWhoZERI.jpg',
	]]);

//$db['top_text'] = "Граффіті оформлення являє собою вишуканий метод неповторно прикрасити і перетворити стилістику як внутрішнього інтер'єру так і фасаду. Художнє оформлення, виконане технікою нанесення фарби аерозольними балонами, перетворює приміщення, додає родзинку, створюючи стильну атмосферу.<br />
//<br />
//VINN ART пропонує послуги з оформлення інтер'єрів та екстер'єрів під замовлення, будь-якої складності, будь-якого масштабу, на будь-якій поверхні. Створення трафаретів, трафаретне і графічне нанесення реклами, малювання холстів, банерів і багато іншого.<br />
//<br />
//Ціна встановлюется залежно від розмірів та складності малюнку.<br />
//Вартість 1м.кв від 200 до 300 грн. з матеріалами";
//print_r($db);
//	$db['images'][17]['images'][] = '/img/X_-qeOkuR24.jpg';
//print_r($db);
//die;
header("Content-Type: application/json");
echo json_encode($db);
