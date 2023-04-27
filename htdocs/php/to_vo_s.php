<!DOCTYPE html>
<html>
    <head>
    <title>keijiban.php</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./../bootstrap-5.2.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./../css/color.css">
    <script src="./js/checkbox.js"></script>
    </head>
<body>
    
<?php

   try{
    require_once("DB_connect.php");

    $data = $db->prepare('SELECT * FROM vote WHERE thread_id=? ORDER BY count DESC');
    $data->execute(array($_REQUEST['thread_id']));
        
    if($data->rowCount()>2){

        echo '<form action="" method="post">';
        echo '<div class="chkbx">';
        foreach ($data as $row) {
            echo '<label>';
            echo '<input class="form-check-input" type="checkbox" name="vote[]" value="'.$row['id'].'" onclick="click_cb();">'.' '.$row['name'].' '.$row['count'].'票';
            echo '</label>';
            echo '<br>';
        }
        echo '</div>';
        echo '<div class="text-end">';
        echo '<button type="submit" class="btn btn-primary">投票</button>';
        echo '</div>';
        echo '</form>';

    }else{
        foreach ($data as $row) {
            echo $row['name'];
            echo '<br>';
        }
        echo '<br>';
        echo 'あと';
        echo 3-$data->rowCount();
        echo 'つ以上のエントリーで投票できます';
    }

    } catch(PDOException $e){
    echo 'エラーが発生しました' . $e->getMessage();
}

    ?>

</body>
</html>