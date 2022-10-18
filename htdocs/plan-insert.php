<?php
    
        try{
            $db = new PDO('mysql:dbname=kikaku;host=localhost;charset=utf8','kmmk','uwfyzcyr');
            
            $theme = $_POST['theme'];
            $category = $_POST['category'];
            $comment = $_POST['comment'];
                        
            $sql = $db->prepare('INSERT INTO plan(theme, category, comment, date) VALUES(:theme, :category, :comment, NOW()) ');
            $sql->execute(array(':theme' => $theme, ':category' => $category, ':comment' => $comment));
       
            echo 'ランキングが作成されました';

            $id = $db -> lastinsertID(); 

 } catch(PDOException $e){
            echo 'エラーが発生しました' . $e->getMessage();
        }

?>

