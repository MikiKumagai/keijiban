<!DOCTYPE html>
<html>
    <head>
    <title>keijiban.php</title>
    <meta charset="utf-8">
    </head>
<body>
    
<?php  
$db = new PDO(
    'mysql:host=172.17.0.3;dbname=ranking;','apache_webserver','uwfyzcyr',
              [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);

    try{            
        $Data = $db->prepare('SELECT * FROM plan WHERE category=?');
        $Data->execute(array($_REQUEST['id']));
        $hyouji = $Data->fetch();
        $category = $hyouji['category'];

    } catch(PDOException $e){
        echo 'エラーが発生しました' . $e->getMessage();
    }
    ?>

</body>
</html>