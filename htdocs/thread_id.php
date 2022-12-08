<!DOCTYPE html>
<html>
    <head>
    <title>keijiban.php</title>
    <meta charset="utf-8">
    </head>
<body>
    
<?php  
$db = new PDO('mysql:dbname=ranking;host=localhost;charset=utf8','kmmk','uwfyzcyr',
          [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);

    try{            
        $Data = $db->prepare('SELECT * FROM plan WHERE thread_id=?');
        $Data->execute(array($_REQUEST['thread_id']));
        $hyouji = $Data->fetch();
        $thread_id = $hyouji['thread_id'];

    } catch(PDOException $e){
        echo 'エラーが発生しました' . $e->getMessage();
    }
    ?>

</body>
</html>