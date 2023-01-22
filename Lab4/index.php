<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./styles.css">
    <title>Lab4 - ITMO</title>
</head>
<body>
    <div class="title-box">
    <h1 class="title">ITMO restaurant</h1>
    </div>
    
<?php
    if(isset($_GET['layout'])){
        switch ($_GET['layout']){
            case 'list':
                require_once 'src/list.php';
                break;
            case 'create':
                require_once 'src/create.php';
                break;
            case 'update':
                require_once 'src/update.php';
                break;
            case 'delete':
                require_once 'src/delete.php';
                break;
        }
    }else{
        require_once 'src/list.php';
    }
?>
</body>
</html>
