<!DOCTYPE html>
<html>

<head>
    <title>keijiban.php</title>
    <meta charset="utf-8">
</head>

<body>

    <?php
    require_once("DB_connect.php");

    try {
        $Data = $db->prepare('SELECT * FROM plan WHERE thread_id=?');
        $Data->execute(array($_REQUEST['thread_id']));
        $hyouji = $Data->fetch();
        $thread_id = $hyouji['thread_id'];
    } catch (PDOException $e) {
        echo 'エラーが発生しました' . $e->getMessage();
    }
    ?>

</body>

</html>