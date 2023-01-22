<?php
$id=$_GET['id'];
$dom = new DOMDocument();
$dom->load('data/data.xml');
$menu = $dom->getElementsByTagName('menu')->item(0);
$dish=$menu->getElementsByTagName('dish');
$i=0;
$my_dish=$dish->item(1);
while (is_object($dish->item($i++))){
    $cur_dish=$dish->item($i-1)->getElementsByTagName('id')->item(0);
    $cur_dish_id= $cur_dish->nodeValue;
    if( $cur_dish_id== $id){
        $my_dish = $dish->item($i-1);
        break;
    }
}
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

    $i=0;
    while (is_object($dish->item($i++))){
        $cur_dish=$dish->item($i-1)->getElementsByTagName('id')->item(0);
        $dish_id= $cur_dish->nodeValue;
        if( $dish_id== $id){
            $menu->replaceChild($new_dish,$dish->item($i-1));
            break;
        }
    }

    $dom->formatOutput = true;
    $dom->save('data/data.xml')or die('Error');
    header('location: index.php?layout=list');
}
?>

<div class="container-fuild">
    <div class="card">
        <div class="card-header">
            <h2>Изменить информацию о блюде</h2>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Название блюда</label>
                    <input type="text" name="dish_name" class="form-control" required value = "<?php echo $my_dish->getElementsByTagName('name')->item(0)->nodeValue ?>"/>
                </div>
                <div class="form-group">
                    <label for="">Цена блюда</label>
                    <input type="number" name="price" class="form-control" required  value = "<?php echo $my_dish->getElementsByTagName('price')->item(0)->nodeValue ?>">
                </div>
                <div class="form-group">
                    <label for="">Описание блюда</label>
                    <input type="text" name="description" class="form-control" required  value = "<?php echo $my_dish->getElementsByTagName('description')->item(0)->nodeValue ?>">
                </div>
                <div class="form-group">
                    <label for="">Рейтинг блюда</label>
                    <input type="number" name="rank" class="form-control" required  value = "<?php echo $my_dish->getElementsByTagName('rank')->item(0)->nodeValue ?>">
                </div>
                <button name="sbm" class="btn btn-success" type="submit">Обновлять</button>
            </form>
        </div>
    </div>
</div>