<!DOCTYPE html>
<html>
    <head>
    <title>keijiban.php</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./../bootstrap-5.2.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./../css/color.css">
    </head>
<body class='bg-light'>
<?php  

require_once("thread_id.php");

    if(!empty($_POST['contents'])){
        try{
            $sql2 = $db->prepare("SELECT MAX(comment_id) FROM bbs WHERE thread_id=?");
            $sql2->execute(array($_REQUEST['thread_id']));
            $data = $sql2->fetch();
            $comment_id = $data['MAX(comment_id)'];

            $sql = $db->prepare('INSERT INTO bbs(contents, date, thread_id, name, comment_id) VALUES(:contents, NOW(), :thread_id, :name, :comment_id)');
            $sql->execute(array(':contents' => $_POST['contents'], ':thread_id' => $thread_id, ':name'=>$_POST['name'], 'comment_id'=> $comment_id+1));

            $sql3 = $db->prepare('UPDATE plan SET active=NOW() WHERE thread_id = ?');
            $sql3->execute(array($thread_id));

            $_POST['contents'] = NULL;
            
        } catch(PDOException $e){
            echo 'DB接続エラー' . $e->getMessage();
        }
    }
?>
<div class='text-center m-5'>
    投稿完了<br>
    <a class="btn btn-primary" href="../KEIJIBAN.html?thread_id=<?php echo $thread_id; ?>">掲示板に戻る</a>
</div>

</body>
</html>