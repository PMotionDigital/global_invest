jQuery(document).ready(function ($) {

    const inputTel = $('input[type="tel"]');
    const checkbox = $('input[type="checkbox"]');
    const formSubmit = $('form.wpcf7-form .button');

    let wpcf7Elm = document.querySelector('.wpcf7');

    // init

    formSubmit.on('click', function () {
        $(this).addClass('loading');
    });

    //$('select').styler();

    if (wpcf7Elm) {
        wpcf7Elm.addEventListener('wpcf7submit', function (event) {
            formSubmit.removeClass('loading');
        }, false);
    }


    // cookie-message

    if (localStorage.getItem('cookie-message') == 'showed') {

    } else if (localStorage.getItem('cookie-message') == null) {
        setTimeout(function () {
            $('#cookie-message').addClass('show');
        }, 1500);
        localStorage.setItem('cookie-message', 'showed');
    }

    $('#cookie-message .button').click(function () {
        $('#cookie-message').removeClass('show');
    });

    console.log(localStorage.getItem('cookie-message'));

    // parallax

    // flags tel

    const timeBlock = document.querySelector('#time');
    if (timeBlock) {


        var options = {
            utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@16.0.3/build/js/utils.js",
            autoPlaceholder: "aggressive"
        }

        var secondInput = timeBlock.querySelector('.wpcf7-tel');
        var input = document.querySelector(".wpcf7-tel");
        var iti = window.intlTelInput(input, options);
        var secondIti = window.intlTelInput(secondInput, options);


        iti.setCountry('ru')
        secondIti.setCountry('ru')
        $(input).mask('(999) 999-9999');
        $(secondInput).mask('(999) 999-9999');

        input.addEventListener("countrychange", function () {
            var curFormat = $(this).attr('placeholder');
            var doneFormat = curFormat.replace(/[0-9]/g, "9");
            $(this).unmask();
            $(this).mask(`${doneFormat}`);
            $(this).focus();
        });

        secondInput.addEventListener("countrychange", function () {
            var curFormat = $(this).attr('placeholder');
            var doneFormat = curFormat.replace(/[0-9]/g, "9");
            $(this).unmask();
            $(this).mask(`${doneFormat}`);
            $(this).focus();
        });
    }

    // .stocks-items

    $('.stocks-items').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        adaptiveHeight: true,
        responsive: [{
            breakpoint: 992,
            settings: {
                slidesToShow: 2
            }
        }, {
            breakpoint: 768,
            settings: {
                slidesToShow: 1
            }
        }]
    })

    // parallax

    // modals

    let modalClose = '.modal-close,.modal-close--overlay';
    let modalCallBtn = '.button-modal';

    // modalCallBtn.on('click', function() {
    //     btnAttr = $(this).attr('data-modal');
    //     $(`.modal[data-modal="${btnAttr}"]`).addClass('open');
    // });

    $(document).on('click', modalCallBtn, (e) => {
        btnAttr = $(e.currentTarget).attr('data-modal');
        $(`.modal[data-modal="${btnAttr}"]`).addClass('open');
    });
    $(document).on('click', modalClose, (e) => {
        $(e.currentTarget).closest('.modal').removeClass('open');
    })
    // modalClose.on('click', function() {
    //     $(this).closest('.modal').removeClass('open');
    // });


    // var options = {
    //     utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@16.0.3/build/js/utils.js",
    //     autoPlaceholder: "aggressive"
    // };
    // var input = document.querySelector('.form-login [type="tel"]');
    // var iti = window.intlTelInput(input, options);
    // iti.setCountry('ru')
    // $(input).mask('(999) 999-9999');
    // input.addEventListener("countrychange", function () {
    //     var curFormat = $(this).attr('placeholder');
    //     var doneFormat = curFormat.replace(/[0-9]/g, "9");
    //     $(this).unmask();
    //     $(this).mask(`${doneFormat}`);
    //     $(this).focus();
    // });

    const telInit = () => {
        var options = {
            utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@16.0.3/build/js/utils.js",
            autoPlaceholder: "aggressive"
        };
        var input = document.querySelector('.form-login [type="tel"]');
        var iti = window.intlTelInput(input, options);
        iti.setCountry('ru')
        $(input).mask('(999) 999-9999');
        input.addEventListener("countrychange", function () {
            var curFormat = $(this).attr('placeholder');
            var doneFormat = curFormat.replace(/[0-9]/g, "9");
            $(this).unmask();
            $(this).mask(`${doneFormat}`);
            $(this).focus();
        });
    };
    telInit();
    window.tel_init = telInit;

});