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
      $contents = nl2br($hyouji['contents']);
      echo <<<EOS
        <font size=2>
          {$hyouji['comment_id']}{$hyouji['name']}
        </font>
        <p class="px-4">
          <font size=4>
            $contents
          </font>
        </p>
        <p style="text-align:right">
          <font size=2>
            {$hyouji['date']}
          </font>
        </p>
        <div class="dropdown">
          <button class="btn btn-primary btn-sm dropdown-toggle" type="button" 
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            返信
          </button>
          <form class="dropdown-menu px-4 py-3" method="POST" action="php/ke_bb_i.php?thread_id=$thread_id">
            <div class="mb-3">
              <input type="text" name="name" class="form-control" value="名無し">
            </div>
            <div class="mb-3" id="count{$hyouji['comment_id']}">
              <textarea name="contents" class="form-control" row="3" oninput="input('count{$hyouji['comment_id']}')">
                >>{$hyouji['comment_id']}
              </textarea>
              <p class="text-end">
                残り<span>197</span>文字
              </p>
            </div>
            <div class="mb-1 text-end">
              <button type="submit" class="btn btn-primary">送信</button>
            </div>
          </form>
        </div>
        <hr>
      EOS;
    }
  } catch (PDOException $e) {
    echo $e->getMessage();
  } finally {
    $db = null;
  }
  ?>

</body>

</html>