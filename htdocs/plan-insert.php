<!DOCTYPE html>
<html>

<head>
    <title>
        企画｜三大○○
    </title>
</head>

<body>
<?php
    
        try{
            $db = new PDO('mysql:dbname=ranking;host=localhost;charset=utf8','kmmk','uwfyzcyr');
            
            $theme = $_POST['theme'];
            $category = $_POST['category'];
            $comment = $_POST['comment'];
                        
            $sql = $db->prepare('INSERT INTO plan(theme, category, comment, date, thread_id) VALUES(:theme, :category, :comment, NOW(), :thread_id) ');
            $sql->execute(array(':theme' => $theme, ':category' => $category, ':comment' => $comment, ':thread_id' => uniqid() ));
       
            $sql2 = "SELECT * FROM plan";
            $sth = $db -> query($sql2);
            $count = $sth -> rowCount();

 } catch(PDOException $e){
            echo 'エラーが発生しました' . $e->getMessage();
        }

?>

ランキングが作成されました<br>
<a href="http://localhost/keijiban.html?id=<?php echo $count; ?>">作成したランキングページを表示する</a><br>
<a href="top.html">戻る</a>

</body>

</html>