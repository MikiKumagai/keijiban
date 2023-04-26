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
            echo '<button type="button" class="btn btn-primary" id="to" data-toggle="modal" data-target="#reply">返信</button>';
            echo '<p style="text-align:right"><font size=2>';
            echo $hyouji['date'];
            echo '</font></p>';
            echo '<hr>';

            echo '<div class="modal fade" id="reply" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">';
            echo '<div class="modal-dialog" role="document">';
            echo '<div class="modal-content">';
            echo '<div class="modal-header"><p class="modal-title" id="exampleModalLabel">返信</p></div>';
            echo '<div class="modal-body">';
            echo "<form method=\"POST\" action=\"php/ke_bb_i.php?thread_id=$thread_id\">";
            echo '<div class="p-1"><input type="text" name="name" class="form-control" value="名無し"></div>';
            echo '<div class="p-1">';
            echo '<textarea name="contents" id="textarea2" class="form-control" row="3">';
            echo '>>';
            echo $hyouji['comment_id'];
            echo '</textarea>';
            echo '<p class="text-end">残り<span class="length2">200</span>文字</p>';
            echo '</div>';
            echo '<div class="p-1 text-end"><button type="submit" class="btn btn-primary">送信</button></div>';
            echo '</form></div></div></div></div>';

        }
    
    } catch (PDOException $e) {
        echo $e->getMessage();
    
    } finally {
        $db = null;
    }
 ?>
                    <script>
                        textArea2 = document.querySelector('#textarea2'); // テキストエリアの要素
                        const length2 = document.querySelector('.length2'); // 残り文字数を表示させる要素
                        const maxLength2 = 200 // 最大文字数
                        textArea2.addEventListener('input', () => {
                          length2.textContent = maxLength - textArea2.value.length;
                          if(maxLength - textArea2.value.length < 0){
                            length2.style.color = 'red'; // 最大文字数を超過したら赤字で表示する
                          }else{
                            length2.style.color = '#444';
                          }
                        }, false);
                    </script> 
</body>
</html>