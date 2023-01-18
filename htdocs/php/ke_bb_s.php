<!DOCTYPE html>
<html>
    <head>
    <title>keijiban.php</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./../bootstrap-5.2.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./../css/color.css">
    </head>
<body>
    
<?php  
   require_once("thread_id.php");
    
    try {    
        $sql = $db->prepare('SELECT * FROM bbs WHERE thread_id=? ORDER BY date DESC');
        $sql->execute(array($_REQUEST['thread_id']));

        foreach ($sql as $hyouji) {
            echo '<font size=2>';
            echo $hyouji['comment_id'], ' ';
            echo $hyouji['name'];
            echo '</font>';
            echo '<p class="px-4"><font size=4>';
            echo nl2br($hyouji['contents']);
            echo '</font></p>';
            echo '<div class="col">';
            echo '<div class="row">';
            echo '<div class="col-6"><a href="#" id="to" data-toggle="modal" data-target="#comment">返信</a></div>';
            echo '<div class="col-6"><p style="text-align:right"><font size=2>';
            echo $hyouji['date'];
            echo '</font></p></div>';
            echo '</div></div><hr>';
        }
    
    } catch (PDOException $e) {
        echo $e->getMessage();
    
    } finally {
        $db = null;
    }
    ?>

</body>
</html>