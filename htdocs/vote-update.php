<?php
    
if(!empty($_POST['vote'])){
        try{
            $db = new PDO('mysql:dbname=tohyo;host=localhost;charset=utf8','kmmk','uwfyzcyr');
            $sql = $db->prepare('UPDATE vote SET count = count+1 WHERE id = ?');
            $sql->execute(array($_POST['vote']));
            echo '投票完了';
            echo '<br>';
            echo '<a href="tohyo1.html">戻る</a>';
            } catch(PDOException $e){
            echo 'エラーが発生しました' . $e->getMessage();
        }
    }
?>