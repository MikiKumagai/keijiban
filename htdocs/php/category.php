<!DOCTYPE html>
<html>
    <head>
    <title>keijiban.php</title>
    <meta charset="utf-8">
    </head>
<body>
    
<?php  
require_once("DB_connect.php");

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