import $ from 'jquery';
import './jquery.mousewheel';
import './jquery.mCustomScrollbar';
import WOW from 'wow.js';
import Swiper from 'swiper';

global.jQuery = $;
global.$ = $;

$(document).ready( function() {

    const $_w = $(window);
    const $_topMenuContainer = $('.header__container');

    $('.search-form-item').on( 'click', function( e ) {
       if ( $(e.target).hasClass('search-form-item') ) {
           $(this).find('form').toggleClass('active');
       }
    });

    const topSwiper = new Swiper( '.west-slider.top-slider', {
        direction: 'horizontal',
        loop: true,
        pagination: {
            el: '.swiper-pagination',
        },
    } );

    topSwiper.on('slideChange', function ( swiper ) {
        $('.west-slider__nav-item').each( function( i, el ) {
            if ( ( i + 1 ) != topSwiper.activeIndex ) {
                $(el).removeClass('active');
            }
            else if ( ( i + 1 ) == topSwiper.activeIndex ){
                $(el).addClass('active');
            }
        } );
        if ( topSwiper.activeIndex == ( $('.west-slider__nav-item').length + 1 ) ) {
            $($('.west-slider__nav-item')[0]).addClass('active');
        }
        if ( topSwiper.activeIndex == 0 ) {
            $($('.west-slider__nav-item')[$('.west-slider__nav-item').length - 1]).addClass('active');
        }
    });

    $('.west-slider__nav-item').on( 'click', function( e ) {
        let currentNumber = parseInt($(this).text());
        topSwiper.slideTo( currentNumber );
        $(this).addClass('active');
    });

    $_w.on( 'scroll', function( e ) {
        if ( $_w.scrollTop() > 100 ) {
            $_topMenuContainer.addClass( 'darkened' );
        }
        else {
            $_topMenuContainer.removeClass( 'darkened' );
        }
    } );

    $('.west-slider__nav-item:first-child').trigger( 'click' );
    $('.accordion-body').mCustomScrollbar({
        theme:"dark"
    });

    $('.menu-manage').on( 'click', function( e ) {
        $('body').toggleClass('top-menu-opened');
    } );

} );
