<!DOCTYPE html>
<html>
    <head>
    <title>keijiban.php</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="bootstrap-5.2.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./color.css">
    </head>
<body>
    
<?php  
   require_once("thread_id.php");

   if(!empty($_POST['entry'])){
    try{
        $db = new PDO('mysql:dbname=ranking;host=localhost;charset=utf8','kmmk','uwfyzcyr');

        $check = $db->prepare("SELECT * FROM vote WHERE name = ? AND thread_id = $thread_id");
        $check->execute(array($_POST['entry']));
        $kakunin = $check->fetch();

          if(isset($kakunin['name'], $kakunin['thread_id'])){
            echo '<script>window.confirm("既にエントリーされています")</script>';
          }else{
            $sql = $db->prepare('INSERT INTO vote SET name = ?, count = 0, id = ?, thread_id = ?');
            $sql->execute(array($_POST['entry'], uniqid(), $thread_id));
            echo '<script>window.confirm("エントリー完了しました")</script>';
          }

    } catch(PDOException $e){
        echo 'エラーが発生しました' . $e->getMessage();
    }
  }


    ?>

</body>
</html>