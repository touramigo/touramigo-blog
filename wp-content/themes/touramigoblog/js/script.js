/**
 * Created by Alexey on 17.03.2017.
 */
function checkParams() {
    var ss = $('#s').val();
    if(ss.length != 0) {
        $('.w-search-form__btn').removeAttr('disabled').css('cursor', 'pointer');
    } else {

        $('.w-search-form__btn').attr('disabled', 'disabled').css('cursor', 'default');
    }
}
$(document).ready(function(){
    $('.w-search__btn, .w-search__close').on('click', function(){
        $(this).parents('.w-search').toggleClass('open');
    });

    $('.menu-btn').on('click', function(){
        var shiftMenu = '-832px', shiftPage = '-812px';

        if($(window).width() <= 1100) {
            shiftMenu = '-630px';
            shiftPage = '-610px';
        }

        if($(window).width() <= 950) {
            shiftMenu = '-392px';
            shiftPage = '-372px';
        }

        if($(window).width() <= 600) {
            shiftMenu = '-340px';
            shiftPage = '-320px';
        }

        if($(this).hasClass('open')) {
            $(this).removeClass('open');
            $('.page-wrap').css({'height': 'auto', 'position': 'relative'}).animate({'left': '0'});
            $('html,body').stop().scrollTop(0);
            $('body').css('overflow-y', 'auto');
            $('.menu').css('position', 'fixed').animate({'right': shiftMenu});
            $('.menu-overlay').css('display', 'none');
        } else {
            $(this).addClass('open');
            $('.page-wrap').css({'height': '100%', 'position': 'fixed'}).animate({'left': shiftPage});
            $('.menu').css('position', 'absolute').animate({'right': '0'});
            $('.menu-overlay').css('display', 'block');
            $('body').css('overflow-y', 'scroll');
        }
    });

    $('.menu-overlay, .menu__close').on('click', function(){
        $('.menu-btn').trigger('click');
    });

    $('.menu-category .menu-category__link').on('click', function(e){
        e.preventDefault();
        var block = $(this).parents('.menu-category');

        if(block.hasClass('open')) {
            block.removeClass('open');
            block.find('.menu-sub-categories').slideUp();
        } else {
            block.addClass('open');
            block.find('.menu-sub-categories').slideDown();
        }
    });

    $('.scroll-btn').on('click', function(){
        $('html,body').stop().animate({ scrollTop: $($(this).data('href')).offset().top}, 1000);
        e.preventDefault();
    });

    $('.subscribe').submit(function(e){
        e.preventDefault();

        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: $(this).serialize()
        }).fail(function()  {
            $('.overlay').fadeIn(400,
                function () {
                    $('.popup-subscribing')
                        .css('display', 'block')
                        .animate({opacity: 1}, 200);
                });
            return false;
        });
    });

    $('.popup__close, .overlay').click(function () {
        $('.popup')
            .animate({opacity: 0}, 200,
                function () {
                    $(this).css('display', 'none');
                    $('.overlay').fadeOut(400);
                }
            );
    });

    $('.h-full').height($(window).height());
    $(window).resize(function(){
        $('.h-full').height($(window).height());
    });


    var tours = $('.tour');

    for(var i = 0; i < tours.length; i++) {
        tours.eq(i).find('.tour-slides').bxSlider({
            pagerCustom: tours.eq(i).find('.tour-slider-control'),
           nextSelector: tours.eq(i).find('.tour-slider__next'),
            prevSelector: tours.eq(i).find('.tour-slider__prev'),
           nextText: ' ',
            prevText: ' ',
            onSliderLoad: function () {
                $(".tours .bx-pager.bx-default-pager").remove();
            }
        });
    }

});