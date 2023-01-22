<?php $id = $_GET['id'];
$dom = new DOMDocument();
$dom->load('data/data.xml');
$menu = $dom->getElementsByTagName('menu')->item(0);
$dish=$menu->getElementsByTagName('dish');

$i=0;
while (is_object($dish->item($i++))){
    $dish_delete=$dish->item($i-1)->getElementsByTagName('id')->item(0);
        $dish_delete_id= $dish_delete->nodeValue;
    if( $dish_delete_id== $id){
        $menu->removeChild($dish->item($i-1));
        break;
    }
}

$dom->formatOutput=true;
$dom->save('data/data.xml')or die('Error');
    header('location: index.php?layout=list');
?>