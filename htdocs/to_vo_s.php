<!DOCTYPE html>
<html>
    <head>
    <title>keijiban.php</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="bootstrap-5.2.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./color.css">
    </head>
<body>
    
<?php  
   require_once("thread_id.php");

   try{
    $sql = $db->prepare('SELECT * FROM vote WHERE thread_id=? ORDER BY count DESC');
    $sql->execute(array($_REQUEST['thread_id']));
    
    echo '<form action="" method="post">';
    echo '<div class="chkbx m-4 p-3 text-dark bg-success">';
    foreach ($sql as $row) {
        echo '<input class="form-check-input" type="checkbox" name="vote[]" value="'.$row['id'].'" onclick="click_cb();">'.$row['name'].' '.$row['count'].'票';
        echo '<br>';
    }
    echo '</div>';
    echo '<div class="float-end me-4">';
    echo '<button type="submit" class="btn btn-primary">投票</button>';
    echo '</div>';
    echo '</form>';
    } catch(PDOException $e){
    echo 'エラーが発生しました' . $e->getMessage();
}

    ?>

</body>
</html>