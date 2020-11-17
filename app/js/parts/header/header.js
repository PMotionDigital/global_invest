jQuery(document).ready(function($){


const mainHeader = $('#header');
const mainBody = $('body');

$(window).on('scroll', function() {
    let scrolled = $(this).scrollTop();
    //console.log(scrolled);
    if (scrolled > 50) {
        mainHeader.addClass('fixed');
    } else {
        mainHeader.removeClass('fixed');
    }
});

// header submenu

let headerHeight = $('#header').outerHeight();

$('.header_sub-menu').css({
    'top': headerHeight
});

const menuItem = $('.has-submenu');
const subMenu = $('.header_sub-menu');

let menuOpened = false;

menuItem.on('mouseenter', (e) => {
    subMenu.addClass('open');
    menuOpened = true;
});

$(document).on('mousemove', (e) => {
    if (menuOpened) {
        let trigger = $(e.target).closest('.has-submenu').length;
        let hover = $(e.target).closest('.header_sub-menu').length;
        if (!trigger && !hover) {
            menuOpened = false;
            subMenu.removeClass('open');
        }
    }

}); 

$('.tabs-nav__item').hover(function() {
    $(this).trigger('click');
})

// header mobile

if($(window).width() < 767) {
    headerMobileHeight = $('.header-mobile-top').outerHeight();
    headerMobileNav = $('.header-mobile-nav'); 
    headerBurger = $('.header-mobile-burger');

    // mainBody.css({
    //     'padding-top' : headerMobileHeight
    // })

    headerBurger.on('click', function() {
        mainHeader.toggleClass('open');
    })

    // headerMobileNav.css({
    //     'top' : headerMobileHeight,
    //     'height' : `calc(100% - ${headerMobileHeight}px)`
    // })
}
});