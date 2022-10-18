<?php
    
        try{
            $db = new PDO('mysql:dbname=kikaku;host=localhost;charset=utf8','kmmk','uwfyzcyr');
            
            $theme = $_POST['theme'];
            $category = $_POST['category'];
            $comment = $_POST['comment'];
                        
            $sql = $db->prepare('INSERT INTO plan(theme, category, comment, date) VALUES(:theme, :category, :comment, NOW()) ');
            $sql->execute(array(':theme' => $theme, ':category' => $category, ':comment' => $comment));
       
            echo '初期エントリー';
            echo '<br>';
            echo '<form method="POST" action="vote-insert2.php">
            <input type="text" name="entry" size="40"><br>
            <input type="text" name="entry" size="40"><br>
            <input type="text" name="entry" size="40"><br>
            <input type="submit" value="送信">
            </form><br>';

            $id = $db -> lastinsertID(); 

            $db2 = new PDO('mysql:dbname=keijiban;host=localhost;charset=utf8','kmmk','uwfyzcyr');
                        
            $sql2 = 'CREATE TABLE '.$id.'BBS(
                NUM MEDIUMINT NOT NULL AUTO_INCREMENT,
                contents varchar(150),
                date datetime,
                PRIMARY KEY (NUM))';
            $db2->query($sql2);


            $db3 = new PDO('mysql:dbname=tohyo;host=localhost;charset=utf8','kmmk','uwfyzcyr');
                        
            $sql3 = 'CREATE TABLE '.$id.'vote(
                name varchar(20),
                count int default 1,
                id varchar(13))';
            $db3->query($sql3);

            } catch(PDOException $e){
            echo 'エラーが発生しました' . $e->getMessage();
        }

?>

