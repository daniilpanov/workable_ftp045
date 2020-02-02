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

    <style>
        .carousel-outer
        {
            box-shadow: 0 0 20px 10px black;
            width: 100%;
            height: 100%;
        }

        .carousel
        {
            position: fixed;
            margin: auto;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;

            display: none;

            background-color: rgba(0, 0, 0, 0.25);
            box-shadow: inset 0 0 20em 10em black;

            padding: 10em 25em;
        }

        .carousel .carousel-inner
        {
            height: 100%;
            vertical-align: middle;
        }

        .carousel.visible
        {
            display: block;
        }
    </style>

    <script>
        $(document).ready(function ()
        {
            $("img").each(function (index, element)
            {
                var clickImg = (function ()
                {
                    var el = $(this);
                    el.unbind("click");

                    if (el.attr("aria-label"))
                    {
                        var label = el.attr("aria-label");
                        var div = $(".carousel[aria-label=" + label + "]");
                        var closable = true;

                        var imgs = $(".carousel[aria-label=" + label + "] img");

                        var widths = [];
                        var heights = [];

                        imgs.each(function (index, element)
                        {
                            widths[index] = element.width;
                            heights[index] = element.height;
                        });

                        div.width(Math.max.apply(null, widths));
                        div.height(Math.max.apply(null, heights));

                        div.addClass("visible");

                        setTimeout(function ()
                        {
                            div.click(function ()
                            {
                                closable = false;
                            });
                            $("body").click(function ()
                            {
                                if (closable)
                                {
                                    div.removeClass("visible");
                                    el.click(clickImg);
                                    $("body").unbind("click");
                                }
                                else
                                    closable = true;
                            });
                        });
                    }
                });
                $(element).click(clickImg);
            });
        });
    </script>
</head>
<body>
<!-- Контент страницы -->
<div class="container text-center">
    <img src="../files/upload/images/for_2.1.png" alt="..." aria-label="4">
    <h1 class="h3" style="margin-top: 20px; margin-bottom: 5px;">Bootstrap 3 - Carousel (карусель)</h1>
    <h2 class="h4" style="margin-top: 0; margin-bottom: 20px;">без элементов управления</h2>

    <!-- Bootstrap 4 -->
    <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel" aria-label="4">
        <table class="carousel-outer">
            <!-- Индикаторы -->
            <ol class="carousel-indicators">
                <li data-target="#carousel" data-slide-to="0" class="active"></li>
                <li data-target="#carousel" data-slide-to="1"></li>
                <li data-target="#carousel" data-slide-to="2"></li>
            </ol>
            <td class="carousel-inner zoomed">
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
            </td>
            <!-- Элементы управления -->
            <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Предыдущий</span>
            </a>
            <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Следующий</span>
            </a>
        </table>
    </div>
</div>
</body>
</html>