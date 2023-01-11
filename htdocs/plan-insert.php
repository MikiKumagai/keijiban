<!DOCTYPE html>
<html>

<head>
    <title>
        企画｜三大○○
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="bootstrap-5.2.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./color.css">
</head>

<body class="bg-light">
<?php
    
        try{
            $db = new PDO(
                'mysql:host=172.17.0.3;dbname=ranking;','apache_webserver','uwfyzcyr',
                        );
            
            $theme = $_POST['theme'];
            $category = $_POST['category'];
            $comment = $_POST['comment'];
                        
            $sql = $db->prepare('INSERT INTO plan(theme, category, comment, date, active) VALUES(:theme, :category, :comment, NOW(), NOW()) ');
            $sql->execute(array(':theme' => $theme, ':category' => $category, ':comment' => $comment ));
       
            $sql2 = "SELECT * FROM plan";
            $sth = $db -> query($sql2);
            $count = $sth -> rowCount();

 } catch(PDOException $e){
            echo 'エラーが発生しました' . $e->getMessage();
        }

?>
<div class='text-center m-5'>
    スレッドが作成されました<br>
    <a crass="btn btn-primary" href="KEIJIBAN.html?thread_id=<?php echo $count; ?>">作成したページを表示する</a>
</div>

</body>

</html>