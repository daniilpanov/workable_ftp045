<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="../css/bootstrap/bootstrap-grid.min.css">

    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap/bootstrap.min.js"></script>
    <script src="../js/bootstrap/bootstrap.bundle.min.js"></script>
</head>
<body>
<!-- Контент страницы -->
<div class="container text-center">
    <h1 class="h3" style="margin-top: 20px; margin-bottom: 5px;">Bootstrap 3 - Carousel (карусель)</h1>
    <h2 class="h4" style="margin-top: 0; margin-bottom: 20px;">без элементов управления</h2>

    <!-- Bootstrap 4 -->
    <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
        <!-- Индикаторы -->
        <ol class="carousel-indicators">
            <li data-target="#carousel" data-slide-to="0" class="active"></li>
            <li data-target="#carousel" data-slide-to="1"></li>
            <li data-target="#carousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="img-fluid" src="../files/upload/images/for_2.1.png" alt="...">
                <div class="carousel-caption">
                    11111111
                </div>
            </div>
            <div class="carousel-item">
                <img class="img-fluid" src="../files/upload/images/for_2.2.png" alt="...">

            </div>
            <div class="carousel-item">
                <img class="img-fluid" src="../files/upload/images/for_2.3.png" alt="...">
                <div class="carousel-caption">
                    33333333
                </div>
            </div>
        </div>
        <!-- Элементы управления -->
        <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Предыдущий</span>
        </a>
        <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Следующий</span>
        </a>
    </div>
</div>
</body>
</html>