<?php
$dom = new DOMDocument();
$dom->load('data/data.xml');
$menu = $dom->getElementsByTagName('menu')->item(0);
?>

<div class="container-fuild">
    <div class="card">
        <div class="card-header">
            <h2>Menu</h2>
        </div>
        <div class="card-body">
            <a class="btn btn-primary" href="index.php?layout=create">Добавить новое блюдо</a>
            <table class="table">
                <thead>
                <tr>
                    <th>Номер</th>
                    <th>Название</th>
                    <th>Цена</th>
                    <th>Описание</th>
                    <th>Ранг</th>
                    <th>Редактировать</th>
                    <th>Удалить</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i=0;
                $dish=$menu->getElementsByTagName('dish');
                while (is_object($dish->item($i++))){
                    ?>
                <tr>
                    <td><?php echo $i?></td>
                    <td><?php echo $dish->item($i-1)->getElementsByTagName('name')->item(0)->nodeValue?></td>
                    <td><?php echo $dish->item($i-1)->getElementsByTagName('price')->item(0)->nodeValue?></td>
                    <td><?php echo $dish->item($i-1)->getElementsByTagName('description')->item(0)->nodeValue?></td>
                    <td><?php echo $dish->item($i-1)->getElementsByTagName('rank')->item(0)->nodeValue?></td>
                    <td>
                        <a  class="btn btn-success"
                            href="index.php?layout=update&id=<?php echo  $dish->item($i-1)->getElementsByTagName('id')->item(0)->nodeValue; ?>"> 
                            Изменить  
                            <!-- <?php echo  $dish->item($i-1)->getElementsByTagName('id')->item(0)->nodeValue; ?> -->
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-danger"
                        onclick="return Confirm('<?php echo $dish->item($i-1)->getElementsByTagName('name')->item(0)->nodeValue;?>\\')" 
                        href= "index.php?layout=delete&id=<?php echo  $dish->item($i-1)->getElementsByTagName('id')->item(0)->nodeValue; ?>" >Удалить</a>
                    </td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function Confirm(name){
        return confirm("Вы уверены, что хотите удалить: "+name+" ?");
    }
</script>