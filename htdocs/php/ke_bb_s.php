<!DOCTYPE html>
<html>

<head>
  <title>
    keijiban.php
  </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="./../bootstrap-5.2.2-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="./../css/color.css">
  <script src="./js/count.js"></script>
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
      echo '<p style="text-align:right"><font size=2>';
      echo $hyouji['date'];
      echo '</font></p>';

      echo '<div class="dropdown">';
      echo '<button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" 
                  aria-haspopup="true" aria-expanded="false"> 返信 </button>';
      echo "<form class=\"dropdown-menu px-4 py-3\" method=\"POST\" action=\"php/ke_bb_i.php?thread_id=$thread_id\">";
      echo '<div class="mb-3"> <input type="text" name="name" class="form-control" value="名無し"></div>';
      echo "<div class=\"mb-3\" id=\"count", $hyouji['comment_id'], "\">";
      echo "<textarea name=\"contents\" id=\"reply", $hyouji['comment_id'], "\" class=\"form-control\" row=\"3\" oninput=\"input('count", $hyouji['comment_id'], "')\">";
      echo '>>', $hyouji['comment_id'], ' </textarea>';
      echo '<p class="text-end">残り';
      echo "<span class=\"length", $hyouji['comment_id'], "\">197</span>";
      echo '文字</p></div>';
      echo '<div class="mb-1 text-end"> <button type="submit" class="btn btn-primary">送信</button></div>
                  </form></div>';

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