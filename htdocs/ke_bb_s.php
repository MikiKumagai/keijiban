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
    
    try {    
        $stmt = $db->prepare('SELECT * FROM bbs WHERE thread_id=? ORDER BY date DESC');
        $stmt->execute(array($_REQUEST['thread_id']));
        $row_count = $stmt->rowCount();

        foreach ($stmt as $hyouji) {
            echo '<font size=2>';
            echo $row_count, ' ';
            $row_count -= 1;
            echo $hyouji['name'];
            echo '</font>';
            echo '<p class="px-4"><font size=4>';
            echo nl2br($hyouji['contents']);
            echo '</font></p>';
            echo '<p style="text-align:right"><font size=2>';
            echo $hyouji['date'];
            echo '</font></p>';
            echo '<hr>';
        }
    
    } catch (PDOException $e) {
        echo $e->getMessage();
    
    } finally {
        $db = null;
    }
    ?>

</body>
</html>