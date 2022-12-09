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

        try {
            $pdo = new PDO(
                'mysql:host=localhost;dbname=ranking;','kmmk','uwfyzcyr',
                [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
            );
            $sql = "SELECT * FROM plan ORDER BY active DESC";
            $pdo -> query($sql);

            foreach ($pdo -> query($sql) as $row) {
            echo "<a id=active href=\"KEIJIBAN.html?thread_id={$row['thread_id']}\">";
            echo '<font size=4>';
            echo "三大{$row['theme']}";
            echo " {$row['active']} 更新";
            echo '</font>';
            echo '</a>';
            echo '<hr>';
            }

        } catch (PDOException $e) {
            echo $e->getMessage();

        } finally {
            $pdo = null;
        }

    ?>

</body>
</html>