<!DOCTYPE html>
<html>
    <head>
    <title>keijiban.php</title>
    <meta charset="utf-8">
    </head>
<body>
    
<?php  
   require_once("thread_id.php");

   if(!empty($_POST['vote'])){
    try{
        $check_user = $db->prepare('SELECT * FROM user WHERE IP = ? AND thread_id = ?');
        $check_user->execute(array($_SERVER['REMOTE_ADDR'], $thread_id));
        $kakunin_user = $check_user->fetch();
        if(isset($kakunin_user['IP'], $kakunin_user['thread_id'])){
          echo '<script>window.confirm("投票は1人1回までです。")</script>';
        }else{
          foreach($_POST['vote'] as $value){
            $sql2 = $db->prepare('UPDATE vote SET count = count+1 WHERE id = ?');
            $sql2->execute(array($value));
          }
          $sql3 = $db->prepare('INSERT INTO user SET IP = ?, thread_id = ?');
          $sql3->execute(array($_SERVER['REMOTE_ADDR'], $thread_id));
        }
     } catch(PDOException $e){
            echo 'エラーが発生しました' . $e->getMessage();
     }
 }

    ?>

</body>
</html>