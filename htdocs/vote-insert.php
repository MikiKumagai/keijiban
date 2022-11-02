<?php
    
    if(!empty($_POST['entry'])){
        try{
            $db = new PDO('mysql:dbname=ranking;host=localhost;charset=utf8','kmmk','uwfyzcyr');
            
            $Data = $db->prepare('SELECT * FROM plan WHERE thread_id=?');
            $Data->execute(array($_REQUEST['thread_id']));
            $hyouji = $Data->fetch();
            
            $thread_id = $hyouji['thread_id'];

            $sql = $db->prepare('INSERT INTO vote SET name = ?, count = 1, id = ?, thread_id = ?');
            $sql->execute(array($_POST['entry'], uniqid(), $thread_id));
            echo '投票完了';
            echo '<br>';
            echo '<a href="tohyo.html">戻る</a>';
            } catch(PDOException $e){
            echo 'エラーが発生しました' . $e->getMessage();
        }
    }

?>