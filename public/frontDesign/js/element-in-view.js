(function ($) {
    /**
     * Copyright 2012, Digital Fusion
     * Licensed under the MIT license.
     * http://teamdf.com/jquery-plugins/license/
     *
     * @author Sam Sehnert
     * @desc A small plugin that checks whether elements are within
     *     the user visible viewport of a web browser.
     *     only accounts for vertical position, not horizontal.
     */

    $.fn.visible = function (partial) {
        var $t = $(this),
            $w = $(window),
            viewTop = $w.scrollTop(),
            viewBottom = viewTop + $w.height(),
            _top = $t.offset().top,
            _bottom = _top + $t.height(),
            compareTop = partial === true ? _bottom : _top,
            compareBottom = partial === true ? _top : _bottom;

        return compareBottom <= viewBottom && compareTop >= viewTop;
    };
})(jQuery);

$(window).on("scroll", function () {
    $(
        ".about__icons__wrap li:nth-child(1), .about__icons__wrap li:nth-child(2), .about__icons__wrap li:nth-child(3), .about__icons__wrap li:nth-child(4), .about__icons__wrap li:nth-child(5), .about__icons__wrap li:nth-child(6), .about__icons__wrap li:nth-child(7), .about__icons__wrap li:nth-child(8), .about__icons__wrap li:nth-child(9), .about__icons__wrap li:nth-child(10), .about__icons__wrap li:nth-child(11), .about__icons__wrap li:nth-child(12), .about__icons__wrap li:nth-child(13), .about__icons__wrap li:nth-child(14),.about__icons__wrap li:nth-child(15), .about__icons__wrap li:nth-child(16), .about__icons__wrap li:nth-child(17), .about__icons__wrap li:nth-child(18), .partner__logo__wrap li:nth-child(1), .partner__logo__wrap li:nth-child(2), .partner__logo__wrap li:nth-child(3), .partner__logo__wrap li:nth-child(4), .partner__logo__wrap li:nth-child(5), partner__logo__wrap li:nth-child(6), .partner__logo__wrap li:nth-child(7), .partner__logo__wrap li:nth-child(8), .partner__logo__wrap li:nth-child(9), .partner__logo__wrap li:nth-child(10), partner__logo__wrap li:nth-child(11), .partner__logo__wrap li:nth-child(12), .partner__logo__wrap li:nth-child(13), .partner__logo__wrap li:nth-child(14), .partner__logo__wrap li:nth-child(15), partner__logo__wrap li:nth-child(16), .partner__logo__wrap li:nth-child(17), .partner__logo__wrap li:nth-child(18),.testimonial__avatar__img li:nth-child(1), .testimonial__avatar__img li:nth-child(2), .testimonial__avatar__img li:nth-child(3), .testimonial__avatar__img li:nth-child(4), .testimonial__avatar__img li:nth-child(5), .testimonial__avatar__img li:nth-child(6), testimonial__avatar__img li:nth-child(7), .testimonial__avatar__img li:nth-child(8), .testimonial__avatar__img li:nth-child(9), .testimonial__avatar__img li:nth-child(10), .testimonial__avatar__img li:nth-child(11), .testimonial__avatar__img li:nth-child(12), .testimonial__avatar__img li:nth-child(13), testimonial__avatar__img li:nth-child(14), .testimonial__avatar__img li:nth-child(15), .testimonial__avatar__img li:nth-child(16), .testimonial__avatar__img li:nth-child(17), .testimonial__avatar__img li:nth-child(18)"

        // $(window).on("scroll", function () {
        //     $(
        //         ".partner__logo__wrap li:nth-child(1), .partner__logo__wrap li:nth-child(2), .partner__logo__wrap li:nth-child(3), .partner__logo__wrap li:nth-child(5), .partner__logo__wrap li:nth-child(6), .testimonial__avatar__img li:nth-child(1), .testimonial__avatar__img li:nth-child(2), .testimonial__avatar__img li:nth-child(3), .testimonial__avatar__img li:nth-child(5), .testimonial__avatar__img li:nth-child(6), .testimonial__avatar__img li:nth-child(7)"
    ).each(function (i, el) {
        var el = $(el);
        if (el.visible(true)) {
            el.addClass("now-in-view");
        } else {
            el.removeClass("now-in-view");
        }
    });
});
