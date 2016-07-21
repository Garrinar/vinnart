<?php
ini_set('display_errors', 0);

if (!$_GET['page']) {
    header( 'Refresh: 0; url=/?lang=ua&page=oformlenja' );
}
include 'GTools/gfiledb.php';
$dbUrl = 'db/'.$_GET['lang'].'/'.$_GET['page'].'.json';
//$dbUrl = 'db/'.$_GET['lang'].'/'.$_GET['page'].'.php';
$gFileDB = new GFileDB($dbUrl);
$db = $gFileDB->data;
if($_GET['g'] == 1) {
	echo "<pre>".print_r($db, 1)."</pre>"; die;
}
switch ($_GET['lang']) {
    case 'ru':
        include 'content/ru/header.php';
        include 'content/ru/' . $_GET['page'] . '.php';
        include 'content/ru/footer.php';
        break;

    default :
        include 'content/ua/header.php';
        include 'content/ua/' . $_GET['page'] . '.php';
        include 'content/ua/footer.php';
        break;
}