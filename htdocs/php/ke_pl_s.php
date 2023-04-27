<!DOCTYPE html>
<html>

<head>
    <title>plan-select</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./../bootstrap-5.2.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./../css/color.css">
</head>

<body>

    <?php
    require_once("thread_id.php");

    echo '<h2 class="text-center text-dark">';
    echo '三大';
    echo $hyouji['theme'];
    echo '</h2>';
    echo '<h4 class="text-center text-dark p-4">';
    echo nl2br($hyouji['comment']);
    echo '</h4>';

    ?>

</body>

</html>