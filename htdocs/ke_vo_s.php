<!DOCTYPE html>
<html>
<head>
    <title>vote-select</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="bootstrap-5.2.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./color.css">
</head>

<body>
    
<?php  
   require_once("thread_id.php");
    

    try {
        $stmt = $db->prepare('SELECT * FROM vote WHERE thread_id=? ORDER BY count DESC LIMIT 3');
        $stmt->execute(array($thread_id));
      
        $vote[] = [];
        foreach ($stmt as $row) {
            echo $row['name'].'<br>';
            $vote[] = $row['name'];
        }
    
    } catch (PDOException $e) {
        echo $e->getMessage();
    
    } finally {
        $pdo = null;
    }
    

    ?>

</body>
</html>