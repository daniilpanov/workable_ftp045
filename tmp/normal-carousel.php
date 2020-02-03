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
            text-align: center;
            position: fixed;
            margin: auto;
            top: 50%;
            bottom: 0;
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
            text-align: center;

            background-color: rgba(0, 0, 0, 0.5);
            box-shadow: inset 0 0 20em 10em black;

            padding: 10em 25em;

            max-width: 90%;
            max-height: 90%;
        }

        .carousel .carousel-item
        {
            min-width: 200px;
            margin: auto;
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

        .carousel-control-prev, .carousel-control-next
        {
            z-index: 999;
        }
    </style>

    <script>
        $(document).ready(function ()
        {
            $("img").each(function (index, element)
            {
                var el = $(this);

                if (el.attr("aria-label"))
                {
                    var label = el.attr("aria-label");
                    var div = $(".carousel[aria-label=" + label + "]");
                    var outer = $(".carousel[aria-label=" + label + "] .carousel-outer");
                    var imgs = $(".carousel[aria-label=" + label + "] img");

                    var widths = [];
                    var heights = [];

                    imgs.each(function (index, element)
                              {
                                  element.width *= 2;
                                  element.height *= 2;

                                  widths[index] = element.width;
                                  heights[index] = element.height;
                              });

                    div.width(Math.max.apply(null, widths));
                    div.height(Math.max.apply(null, heights));

                    div.on("slide.bs.carousel", function ()
                    {
                        setTimeout(function ()
                        {
                            outer.css("margin-top", -(outer.height() / 2));
                            outer.css("left", (window.innerWidth - outer.width()) / 2);
                        }, 1000);
                    });
                }

                var clickImg = (function ()
                {
                    el.unbind("click");

                    if (el.attr("aria-label"))
                    {
                        var label = el.attr("aria-label");

                        var div = $(".carousel[aria-label=" + label + "]");

                        $(".carousel[aria-label=" + label + "] .carousel-control-prev").click(function ()
                        {
                            div.carousel("prev");
                        });
                        $(".carousel[aria-label=" + label + "] .carousel-control-next").click(function ()
                        {
                            div.carousel("next");
                        });

                        var closable = true;

                        div.addClass("visible");

                        setTimeout(function ()
                        {
                            outer.css("margin-top", -(outer.height() / 2));
                            outer.css("left", (window.innerWidth - outer.width()) / 2);

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
    <img src="../files/upload/images/carousel/2.1.jpg" alt="..." aria-label="2">
    <h1 class="h3" style="margin-top: 20px; margin-bottom: 5px;">Bootstrap 3 - Carousel (карусель)</h1>
    <h2 class="h4" style="margin-top: 0; margin-bottom: 20px;">без элементов управления</h2>

    <!-- Bootstrap 4 -->
    <div id="carousel" class="carousel slide center-block" data-ride="carousel" aria-label="2">
        <table class="carousel-outer">
            <!-- Индикаторы -->
            <ol class="carousel-indicators">
                <li data-target="#carousel" data-slide-to="0" class="active"></li>
                <li data-target="#carousel" data-slide-to="1"></li>
                <li data-target="#carousel" data-slide-to="2"></li>
                <li data-target="#carousel" data-slide-to="3"></li>
            </ol>
            <td class="carousel-inner zoomed">
                <div class="carousel-item active text-center">
                    <img class="img-fluid" src="../files/upload/images/carousel/2.2.jpg" alt="...">
                </div>
                <div class="carousel-item text-center">
                    <img class="img-fluid" src="../files/upload/images/carousel/2.3.jpg" alt="...">
                </div>
                <div class="carousel-item text-center">
                    <img class="img-fluid" src="../files/upload/images/carousel/2.4.jpg" alt="...">
                </div>
                <div class="carousel-item text-center">
                    <img class="img-fluid" src="../files/upload/images/carousel/2.5.jpg" alt="...">
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
