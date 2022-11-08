<?php

if(!empty($_POST['contents'])){
    try{
        $db = new PDO('mysql:dbname=ranking;host=localhost;charset=utf8','kmmk','uwfyzcyr');
        
        $sql2 = $db->prepare('INSERT INTO BBS SET contents=?, date=NOW()');
        $sql2->execute(array($_POST['contents']));
        } catch(PDOException $e){
        echo 'DB接続エラー' . $e->getMessage();

        
    }
}
?>