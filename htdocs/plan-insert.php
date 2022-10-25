<?php
    
        try{
            $db = new PDO('mysql:dbname=ranking;host=localhost;charset=utf8','kmmk','uwfyzcyr');
            
            $theme = $_POST['theme'];
            $category = $_POST['category'];
            $comment = $_POST['comment'];
                        
            $sql = $db->prepare('INSERT INTO plan(theme, category, comment, date, thread_id) VALUES(:theme, :category, :comment, NOW(), :thread_id) ');
            $sql->execute(array(':theme' => $theme, ':category' => $category, ':comment' => $comment, ':thread_id' => uniqid() ));
       
            echo 'ランキングが作成されました';

            $id = $db -> lastinsertID(); 

 } catch(PDOException $e){
            echo 'エラーが発生しました' . $e->getMessage();
        }

?>

