<?php
    
    if(!empty($_POST['entry'])){
        try{
            $db = new PDO('mysql:dbname=ranking;host=localhost;charset=utf8','kmmk','uwfyzcyr');
            $sql = $db->prepare('INSERT INTO vote SET name = ?, count = 1, id = ?');
            $sql->execute(array($_POST['entry'], uniqid()));
            echo '投票完了';
            echo '<br>';
            echo '<a href="tohyo.html">戻る</a>';
            } catch(PDOException $e){
            echo 'エラーが発生しました' . $e->getMessage();
        }
    }

?>