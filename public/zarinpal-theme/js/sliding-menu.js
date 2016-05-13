$(document).ready(function () {

    $(this).removeClass('active')

    $('#skin-select').css({"width": "260px"});
    // $('.wrap-fluid').css({"width":"auto","margin-right":"260px",});
    $('#skin-select li span, .devider-title h3, ul.topnav h4, .side-dash, .noft-blue, .noft-purple-number, .noft-blue-number').css({
        "display": "inline-block",
        "float": "none"
    });
    $('.ul.topnav h4, .hide-min-toggle').css({"display": "none"});
    $('.tooltip-tip2').addClass('tooltipster-disable');
    $('.tooltip-tip').addClass('tooltipster-disable');
    $('.datepicker-wrap').css({"position": "absolute", "right": "300px"});
    $('.skin-part').css({"visibility": "visible"});
    $('#menu-showhide').css({"height": "auto", "margin": "-10px 0 0", "width": "260px"});
    $('#skin-select li i').css({"top": "0", "right": "-30px", "padding": "8px 0"});
    $('ul.topnav ul').css({"border-radius": "0", "padding": "15px 25px"});

    // $('img.admin-pic.img-circle').css({"margin":"20px 0 0 20px"});


    $('#menuwrapper').removeAttr('id').addClass();


}); // end doc.ready

