jQuery.preloadImages = function()
{
    for (var i = 0; i < arguments.length; i++)
    {
        jQuery("<img>").attr("src", arguments[ i ]);
    }
};


$.preloadImages("files/base/images/brand.jpg");


$(document).ready(function () {
    //
    let el = $("#brand");
    let prop = el.width() / el.height();

    el.width(window.innerWidth - 45);
    el.height(el.width() / prop - 50);

    window.onresize = (function () {
        el.width(window.innerWidth - 45);
        el.height(el.width() / prop - 50);
    });

    ratingSetUp();

    $("img").each(function (index, element)
    {
        var el = $(this);
        var clickImg;

        if (el.attr("aria-label"))
        {
            var label = el.attr("aria-label");
            var div = $(".carousel[aria-label=" + label + "]");
            var outer = $(".carousel[aria-label=" + label + "] .carousel-outer");
            var inner = $(".carousel[aria-label=" + label + "] .carousel-inner");
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

            var w = Math.max.apply(null, widths),
                h = Math.max.apply(null, heights);

            outer.width((w > 900) ? 900 : w);
            outer.height((h > 500) ? 500 : h);

            inner.width((w > 900) ? 900 : w);
            inner.height((h > 500) ? 500 : h);

            div.on("slide.bs.carousel", function ()
            {
                setTimeout(function ()
                {
                    console.log(outer.height());
                    outer.css("margin-top", -(outer.height() / 2));
                    outer.css("left", (window.innerWidth - outer.width()) / 2);
                }, 1000);
            });

            clickImg = (function ()
            {
                el.unbind("click");
                $("body").css("overflow-y", "hidden");

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
                            $("body").css("overflow-y", "scroll");
                            $("body").unbind("click");
                        }
                        else
                            closable = true;
                    });
                });
            });
        }
        else
        {
            clickImg = (function ()
            {
                $("body").css("overflow-y", "hidden");
                el.unbind("click");
                $("<img src='" + el.prop("src") + "' class='zoomed' alt='Sorry, this image cannot be zoomed!'>")
                    .appendTo("body").width(el.width() * 2.5).height(el.height() * 2.5)
                    .click(function ()
                           {
                               el.click(clickImg);
                               $("body").css("overflow-y", "scroll");
                               $(this).remove();
                           });
            });
        }

        $(element).click(clickImg);
    });

    $(".no-zoom").unbind("click");

    //
    $('ul.dropdown-menu [data-toggle=dropdown]').on('click', function(event) {
        event.preventDefault();
        event.stopPropagation();
        $(this).parent().siblings().removeClass('open');
        $(this).parent().toggleClass('open');
    });
});
