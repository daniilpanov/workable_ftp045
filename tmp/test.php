<?php
function printImgs($imgs)
{
    for ($i = 0; $i < count($imgs); $i++)
    {
        echo "<div class='col-md'><img src='../files/upload/images/" . $imgs[$i] . "' alt='Img№$i' class='img'></div>";

        if (($i+1) % 2 == 0)
            echo "<div class='w-100'></div>";
    }
}
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test</title>

    <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../css/content.css">
    <link rel="stylesheet" href="../css/style.css">

    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap/bootstrap.min.js"></script>
    <script src="../js/myjs.js"></script>
</head>
<body>
<div class="frame" style="max-width: 30%">
    <div class="frame-item center row zoom-imgs">
        <?php
        printImgs(['m1.jpg', 'm2.jpg', 'm3.png', 'm4.png', 'm5.png', 'm6.png']);
        ?>
        <i class="red">Мы предлагаем <wbr>различные стилевые решения.</i>
    </div>
</div>
</body>
</html>