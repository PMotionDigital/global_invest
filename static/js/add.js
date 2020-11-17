
// $(document).ready(function () {
//   if (window.innerWidth < 480) {
//     var $actualItems = $('.actual-items');
//     $actualItems.slick({
//       slidesToShow: 1
//     });
//   }
// });
// "use strict";

// $(document).ready(function () {
//   var $topSlides = $('.changes-top__slides');
//   var $changesNewsSlides = $('.changes-news__slides');
//   $changesNewsSlides.slick({
//     slidesToShow: 3,


//     responsive: [{
//       breakpoint: 992,
//       settings: {
//         slidesToShow: 2
//       }
//     }, {
//       breakpoint: 768,
//       settings: {
//         slidesToShow: 1
//       }
//     }]
//   });
//   $topSlides.slick({
//     slidesToShow: 3,
//     autoplay: true,
//     responsive: [{
//       breakpoint: 992,
//       settings: {
//         slidesToShow: 2
//       }
//     }, {
//       breakpoint: 768,
//       settings: {
//         variableWidth: true
//       }
//     }]
//   });
// });
"use strict";

// $(document).ready(function () {
//   if (window.innerWidth < 992) {
//     $('.deposit-item').eq(0).remove();
//     var $depItems = $('.deposit-items');
//     $depItems.slick({
//       variableWidth: true
//     });
//   }
// });
// "use strict";

$(document).ready(function () {
  var $expertsSlides = $('.experts-slides');
  $expertsSlides.slick({
    slidesToShow: 4,
    responsive: [{
      breakpoint: 1445,
      settings: {
        slidesToShow: 3
      }
    }, {
      breakpoint: 767,
      settings: {
        slidesToShow: 2
      }
    }, {
      breakpoint: 480,
      settings: {
        slidesToShow: 1
      }
    }]
  });
});
"use strict";

$(document).ready(function () {
  $('.faq-item__question').on('click', function () {
    $(this).parent().toggleClass('active');
    $(this).next().slideToggle();
  });
});
"use strict";

$(document).ready(function () {
  $('input,textarea').focus(function () {
    $(this).data('placeholder', $(this).attr('placeholder'));
    $(this).attr('placeholder', '');
  });
  $('input,textarea').blur(function () {
    $(this).attr('placeholder', $(this).data('placeholder'));
  });
});
"use strict";

$(document).ready(function () {
  $(".index-more").on("click", "a", function (event) {
    //отменяем стандартную обработку нажатия по ссылке
    event.preventDefault(); //забираем идентификатор бока с атрибута href

    var id = $(this).attr('href'),
        //узнаем высоту от начала страницы до блока на который ссылается якорь
    top = $(id).offset().top; //анимируем переход на расстояние - top за 1500 мс

    $('body,html').animate({
      scrollTop: top
    }, 1500);
  });
  $(".index-arrow").on("click", "a", function (event) {
    //отменяем стандартную обработку нажатия по ссылке
    event.preventDefault(); //забираем идентификатор бока с атрибута href

    var id = $(this).attr('href'),
        //узнаем высоту от начала страницы до блока на который ссылается якорь
    top = $(id).offset().top; //анимируем переход на расстояние - top за 1500 мс

    $('body,html').animate({
      scrollTop: top
    }, 1500);
  });
});
"use strict";

$(document).ready(function () {
  var $licensesSlides = $('.licenses-slides');
  $licensesSlides.slick({
    slidesToShow: 4,
    responsive: [{
      breakpoint: 1445,
      settings: {
        slidesToShow: 3
      }
    }, {
      breakpoint: 767,
      settings: {
        slidesToShow: 2
      }
    }, {
      breakpoint: 480,
      settings: {
        slidesToShow: 1
      }
    }]
  });
});
"use strict";

// $(document).ready(function () {
//   if(window.innerWidth < 480){
//     var $stocksItems = $('.stocks-items');
//     $stocksItems.slick({
//       slidesToShow: 1
//     });
//   }
// });