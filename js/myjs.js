var img_zoomed = false;

// Предзагрузка картинок (для их быстрого рендеринга)
jQuery.preloadImages = function()
{
    for (var i = 0; i < arguments.length; i++)
    {
        jQuery("<img>").attr("src", arguments[ i ]);
    }
};

// Загружаем картинки до подготовки всего документа
$.preloadImages("files/base/images/brand.jpg"); // верхняя картинка (лого)


// Ждём подготовки всего документа
$(document).ready(function () {
    // ПЕРЕМЕННЫЕ, КОТОРЫЕ ПОНАДОБЯТСЯ ВО МНОГИХ ЧАСТЯХ СКРИПТА
    let body = $("body");

    // Маштабирование логотипа (картинки в шапке)
    let el = $("#brand");
    // получаем пропорцию
    let prop = el.width() / el.height();
    // создаём функцию маштабирования
    let scale_logo = (function () {
        el.width(window.innerWidth - 45);
        el.height(el.width() / prop - 50);
    });
    // вызываем её
    scale_logo();
    // логотип должен маштаюироваться при каждом изменении размера экрана
    window.onresize = scale_logo;


    // Активируем рейтинговые звёзды (для отзывов)
    ratingSetUp();


    // Маштабирование изображений -- ZOOM
    // объявляем переменную для записи в неё функции
    let clk1;
    // перебираем все картинки
    $("img").each(function (index, element)
    {
        let e = $(this);
        // создаём функцию
        clk1 = (function ()
        {
            // если изображение уже увеличено - завершаем работу функции
            if (img_zoomed)
                return;

            // убираем возможность прокрутки контента
            body.css("overflow-y", "hidden");
            // создаём увеличенную картинку
            var new_el = $("<div class='zoomed'><img src='" + e.prop("src") + "' alt='Sorry, this image cannot be zoomed!'></div>")
                .appendTo("body");

            var new_width = window.innerWidth - 250,
                prop = e.height() / e.width(),
                new_height = prop * new_width;

            if (new_height > window.innerHeight - 250)
            {
                new_height = window.innerHeight - 250;
                new_width = new_height / prop;
            }

            img_zoomed = true;
            var f_ret = (function ()
            {
                //
                body.css("overflow-y", "scroll");
                //
                new_el.remove();
                body.unbind("click");

                img_zoomed = false;
            });

            new_el.width(new_width).height(new_height)
                .click(f_ret);

            setTimeout(function () {
                body.click(f_ret);
            });
        });

        //
        $(element).click(clk1);
    });

    //
    var widths = [];
    var heights = [];
    var clk2;

    $(".img-container").each(function (index, element)
    {
        var el = $(this);
        var images = el.find("img[aria-controls]");

        images.unbind("click");

        var label = images.attr("aria-controls");
        var div = $(".carousel[aria-controls=" + label + "]"); //
        var outer = $(".carousel[aria-controls=" + label + "] .carousel-outer"); //
        var inner = $(".carousel[aria-controls=" + label + "] .carousel-inner"); //
        var imgs = $(".carousel[aria-controls=" + label + "] img"); //

        //
        imgs.each(function (index, element)
        {
            //
            element.width *= 2;
            element.height *= 2;
            //
            widths[index] = element.width;
            heights[index] = element.height;
        });

        //
        var w = Math.max.apply(null, widths),
            h = Math.max.apply(null, heights);
        //
        outer.width((w > 900) ? 900 : w);
        outer.height((h > 500) ? 500 : h);
        //
        inner.width((w > 900) ? 900 : w);
        inner.height((h > 500) ? 500 : h);

        //
        div.on("slide.bs.carousel", function ()
        {
            //
            setTimeout(function ()
            {
                //
                outer.css("margin-top", -(outer.height() / 2));
                outer.css("left", (window.innerWidth - outer.width()) / 2);
            }, 1000);
        });

        clk2 = (function ()
        {
            if (img_zoomed)
                return;

            var e = $(this);
            //
            e.unbind("click");
            $("body").css("overflow-y", "hidden");

            //
            var label = e.find("img[aria-controls]").attr("aria-controls"); //
            var div = $(".carousel[aria-controls=" + label + "]"); //

            //
            $(".carousel[aria-controls=" + label + "] .carousel-control-prev").click(function ()
            {
                div.carousel("prev");
            });
            //
            $(".carousel[aria-controls=" + label + "] .carousel-control-next").click(function ()
            {
                div.carousel("next");
            });

            //
            var closable = true;

            //
            div.addClass("visible");

            //
            setTimeout(function ()
            {
                //
                outer.css("margin-top", -(outer.height() / 2));
                outer.css("left", (window.innerWidth - outer.width()) / 2);
                //
                div.click(function ()
                {
                    //
                    closable = false;
                });
                img_zoomed = true;
                //
                $("body").click(function ()
                {
                    //
                    if (closable)
                    {
                        //
                        div.removeClass("visible");
                        //
                        e.click(clk2);
                        //
                        $("body").css("overflow-y", "scroll")
                            .unbind("click");
                        //
                        img_zoomed = false;
                    }
                    //
                    else
                        closable = true;
                });
            });
        });

        //
        el.click(clk2);
    });


    //
    $(".no-zoom").unbind("click");


    //
    $('ul.dropdown-menu [data-toggle=dropdown]').on('click', function(event) {
        event.preventDefault();
        event.stopPropagation();
        $(this).parent().siblings().removeClass('open');
        $(this).parent().toggleClass('open');
    });

    //
    $(".close-n-cache").click(function () {
        $.cookie("hint" + $(this).prop('id'), false);
    });
});