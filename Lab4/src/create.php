<?php

$dom = new DOMDocument();
$dom->load('data/data.xml');
$menu = $dom->getElementsByTagName('menu')->item(0);
$dish=$menu->getElementsByTagName('dish');
$index = $dish->length;
$id=$dish[$index-1]->getElementsByTagName('id')->item(0)->nodeValue+1;

if(isset($_POST['sbm'])){
    $dish_name = $_POST['dish_name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $rank = $_POST['rank'];
    $new_dish = $dom->createElement('dish');
    $node_id = $dom->createElement('id',$id);
    $new_dish->appendChild($node_id);
    $node_name = $dom->createElement('name',$dish_name);
    $new_dish->appendChild($node_name);

    $node_price = $dom->createElement('price',$price);
    $new_dish->appendChild($node_price);

    $node_description = $dom->createElement('description',$description);
    $new_dish->appendChild($node_description);

    $node_rank = $dom->createElement('rank',$rank);
    $new_dish->appendChild($node_rank);
    $menu->appendChild($new_dish);

    $dom->formatOutput=true;
    $dom->save('data/data.xml')or die('Error');
    header('location: index.php?layout=list');
}
?>

<div class="container-fuild">
    <div class="card">
        <div class="card-header">
            <h2>Добавить блюда</h2>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Название блюда</label>
                    <input type="text" name="dish_name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Цена блюда</label>
                    <input type="number" name="price" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Описание блюда</label>
                    <input type="text" name="description" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Рейтинг блюда</label>
                    <input type="number" name="rank" class="form-control" required>
                </div>
                <button name="sbm" class="btn btn-success" type="submit">Создавать</button>
            </form>
        </div>
    </div>
</div>