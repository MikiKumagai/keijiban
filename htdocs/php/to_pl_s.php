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

    try {
        require_once("DB_connect.php");

        $sql = "SELECT * FROM plan ORDER BY active DESC";
        $data = $db->query($sql);

        if ($data->rowCount() > 0) {
            foreach ($data as $row) {
                echo "<a id=active href=\"KEIJIBAN.html?thread_id={$row['thread_id']}\">";
                echo '<p class="px-4"><font size=5>';
                echo "三大{$row['theme']}";
                echo '</font>';
                echo '<p class="px-4" style="text-align:right"><font size=2>';
                echo " {$row['active']} 更新";
                echo '</font>';
                echo '</a>';
                echo '<hr>';
            }
        } else {
            echo 'スレッドがありません';
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    } finally {
        $db = null;
    }

    ?>

</body>

</html>