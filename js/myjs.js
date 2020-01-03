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
        var clickImg = (function ()
        {
            var el = $(this);
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
        $(element).click(clickImg);
    });

    //
    $('ul.dropdown-menu [data-toggle=dropdown]').on('click', function(event) {
        event.preventDefault();
        event.stopPropagation();
        $(this).parent().siblings().removeClass('open');
        $(this).parent().toggleClass('open');
    });
});