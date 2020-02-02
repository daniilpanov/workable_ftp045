<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <script src="../js/jquery.min.js"></script>

    <style>
        #carousel
        {

        }

        #carousel-inner
        {

        }

        #control
        {

        }

        #carousel-indicators
        {

        }

        #carousel-indicators .indicator
        {

        }

        #prev
        {

        }

        #next
        {

        }

        .slide
        {

        }

        .slide.active
        {

        }
    </style>

    <script>
        $(document).ready(function ()
        {
            var carousel = $("#carousel");
            var indicators = $("#carousel-indicators");
            var inner = $("#carousel-inner");
            var slides = $(".slide");
            var active_slide = $(".slide.active");
            var prev = $("#prev");
            var next = $("#next");


        });
    </script>

</head>
<body>
<div id="carousel">
    <div id="carousel-inner">
        <div class="slide active">
            <img src="../files/upload/images/for_2.1.png" alt="...">
        </div>
        <div class="slide">
            <img src="../files/upload/images/for_2.1.png" alt="...">
        </div>
        <div class="slide">
            <img src="../files/upload/images/for_2.1.png" alt="...">
        </div>
    </div>

    <div id="control">
        <div id="carousel-indicators">
        </div>

        <span id="prev"><</span>
        <span id="next">></span>
    </div>
</div>
</body>
</html>