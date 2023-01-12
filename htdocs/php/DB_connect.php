<!DOCTYPE html>
<html>

<head>
    <title>keijiban.php</title>
    <meta charset="utf-8">
</head>

<body>

    <?php
    $db = new PDO(
        'mysql:host=172.17.0.3;dbname=ranking;',
        'apache_webserver',
        'uwfyzcyr',
        [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
    );
    ?>

</body>

</html>