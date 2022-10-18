<?php

if(!empty($_POST['contents'])){
    try{
        $db = new PDO('mysql:dbname=keijiban;host=localhost;charset=utf8','kmmk','uwfyzcyr');
        $sql = $db->prepare('INSERT INTO BBS SET contents=?, date=NOW()');
        $sql->execute(array($_POST['contents']));
        echo '投稿完了';
        echo '<br>';
        echo '<a href="keijiban.html">戻る</a>';
        } catch(PDOException $e){
        echo 'DB接続エラー' . $e->getMessage();

        
    }
}
?>