<?php

if(!empty($_POST['contents'])){
    try{
        $db = new PDO('mysql:dbname=ranking;host=localhost;charset=utf8','kmmk','uwfyzcyr');
        
        // $sql = "INSERT INTO user_list (
        //     name, age, registry_datetime
        // ) VALUES (
        //     'テスト健太', 24, '$date'
        // )";
        // $res = $dbh->query($sql);
        // var_dump($dbh->lastInsertId());
        
        $sql2 = $db->prepare('INSERT INTO BBS SET contents=?, date=NOW()');
        $sql2->execute(array($_POST['contents']));
        echo '投稿完了';
        echo '<br>';
        echo '<a href="keijiban.html">戻る</a>';
        } catch(PDOException $e){
        echo 'DB接続エラー' . $e->getMessage();

        
    }
}
?>