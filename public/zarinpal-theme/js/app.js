//responsive menu slicknav


$(function () {
    "use strict";
    $('.counter-up').counterUp({
        delay: 10,
        time: 3000
    });
    $('.counter-up-fast').counterUp({
        delay: 5,
        time: 1000
    });
    //circular progress animation
    $('.circlestat').circliful();
});


$(function () {
    "use strict";
    $('.slicknav').slicknav({
        label: "زرین پال"
    });
    /*
     * INITIALIZE BUTTON TOGGLE
     * ------------------------
     * always use this code for toggle and close button effect
     */
    $(".side-bar").accordionze({
        accordionze: true,
        speed: 300,
        closedSign: '<i class="icon icon-arrow-67"></i>',
        openedSign: '<i class="icon icon-arrow-68"></i>'
    });

    $(".slim-scroll").slimscroll({
        height: "180px",
        alwaysVisible: false,
        size: "3px"
    });

    $(".sidebar-fixed").slimscroll({
        height: "460px",
        width: "260px",
        position: 'right',
        alwaysVisible: true,
        allowPageScroll: true,
        distance: '1px',
        size: "4px"
    });

});

/*     
 * Add collapse and remove events to boxes
 */

(function ($) {
    "use strict";

    $("[data-widget='collapse']").click(function () {
        //Find the box parent        
        var box = $(this).parents(".box").first();
        //Find the body and the footer
        var bf = box.find(".box-body, .box-footer");
        if (!box.hasClass("collapsed-box")) {
            box.addClass("collapsed-box");
            bf.slideUp();
        } else {
            box.removeClass("collapsed-box");
            bf.slideDown();
        }
    });

})(jQuery);

//Find the box parent

(function ($) {
    "use strict";
    $("[data-widget='remove']").click(function () {

        var box = $(this).parents(".box").first();
        box.slideUp();
    });
})(jQuery);

//jQuery Plugin to make

(function ($) {

    $('input[name="site_ip"]').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
        translation: {'Z': {pattern: /[0-9]/, optional: true}}, placeholder: "___.___.___.___"
    });
    $('input[name="dst_pan"], input[name="pan"]').mask("0000-0000-0000-0000");
    $('input[name="amount"], input[name="request_amount"').mask('000,000,000', {reverse: true});
    $('input[name="iban"]').mask('IR00-0000-0000-0000-0000-0000-00', {
        translation: {
            'I': {pattern: /[I-Ii-i]/, optional: true},
            'R': {pattern: /[R-Rr-r]/, optional: true}
        },
        placeholder: "IR00-0000-0000-0000-0000-0000-00"
    });

})(jQuery);



