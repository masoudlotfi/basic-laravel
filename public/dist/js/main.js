"use strict";function _typeof(a){return a&&"undefined"!=typeof Symbol&&a.constructor===Symbol?"symbol":typeof a}$(document).ready(function(){$(function(){var a=$(".global--header"),b=$(".global--footer"),c=$(".global--sticky"),d=$("[data-sticky]"),e=$("[data-props]"),f=772,g=(($(window).width()/$(window).height()).toFixed(5),function(a){for(var b=[],c=0;c<=a.length;c++)if(b[c]=a.substring(c-1,c),b[c].charCodeAt()>255)return!0;return!1}),h=$("[data-input]");h.on("keyup paste",function(a){var b=h.data("input");null===$(this).val()||g($(this).val())?($(this).css("direction","rtl"),"labs"==b.type&&$(this).parent("form").removeClass("rtl ltr").addClass("rtl")):($(this).css("direction","ltr"),"labs"==b.type&&$(this).parent("form").removeClass("rtl ltr").addClass("ltr"))});var i=function(){var e=a.offset().top+a.height(),f=b.offset().top-(c.height()+c.height()/3),g=$(window).scrollTop();e=e>500?e:300,d.each(function(a){var b=$(this).data("sticky");"undefined"!==("undefined"==typeof b?"undefined":_typeof(b))&&b!==!1&&(g>=e&&f>=g?$(this).addClass("is-sticky"):$(this).removeClass("is-sticky"))})};$(window).on("scroll resize",function(){i()}),"ontouchstart"in window==!1&&e.length>0&&$(document).mousemove(function(a){var b=e.data("props"),c=b.start,d=b.end,f=$(document).width(),g=a.pageX+a.pageY,h=120*g/f/2,i="linear-gradient("+h+"deg, "+d+", "+c+" )";b.gradient===!0&&$("[data-props]").css("background-image",i)}),$('a[href^="#"]').click(function(){var a=$(this).attr("href"),b=$(this).data("path"),c=$(a).offset().top;return c=b===!0?c-d.height():c,$("html, body").animate({scrollTop:c},1e3),!1}),_typeof($(".list--item.on"))&&$(".list--item.on").children("p").slideDown(),$(".list--item header").bind("click",function(){$(this).parent().hasClass("on")?($(this).parent().removeClass("on").addClass("off"),$(this).parent().children("p").slideUp()):($(".list--item").removeClass("on"),$(".list--item p").slideUp(),$(this).parent().removeClass("off").addClass("on"),$(this).parent().children("p").slideDown())}),function(a){a.fn.extend({getFullPath:function(b){function c(d){var e=d.tagName+":eq("+a(d).index()+")",f=a(d).parent()[0];return void 0===f.tagName||b&&"BODY"===f.tagName||(e=[c(f),e].join(" ")),e}return b=b||!1,this.length>0?c(this[0]):""}})}(jQuery);var j=$(".primary-step_content"),k=function(){var a=$(window);j.find("img").parents("div[class^='column__']").each(function(){if(1===$(this).index()){var b=$(this),c=$(this).clone();a.width()<f&&(c.prependTo($(this).parent()),b.remove())}})};("undefined"==typeof j?"undefined":_typeof(j))&&j.length>0&&$(window).on("load resize",function(){k()})})});
//# sourceMappingURL=sourcemap/main.map