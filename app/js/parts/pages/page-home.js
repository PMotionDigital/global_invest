jQuery(document).ready(function($){


var images = ['first', 'second', 'third', 'four'];
const classToggle = $('#changes-change');

function changeBackground() {
  var className = classToggle.attr('class');
  var newIndex = (images.indexOf(className) + 1) % images.length;
  classToggle.removeClass().addClass(images[newIndex]);
}
setInterval(changeBackground, 1200);

if($('body').hasClass('home')) {
	function sliderInit() {
        var slider = $('.home-stocks');
        var track = $('.home-stocks-track');
        var items = $('.home-stocks__item');
        var translate = 0;
        var width = track.outerWidth();
        var count = items.length;
        var nextItemCount = 1;
        var itemWidth = items.outerWidth();
        var velocity = $('body').hasClass('mobile')?1 : 1; //скорость

        if (count < 4) {
            var clones = [];

            items.each(function() {
                var clone = $(this).clone();
                var data = +clone[0].dataset.item;
                clone[0].dataset.item = data + items.length;
                clones.push(clone);
            });

            clones.forEach(function(clone) {
                track.append($(clone));
            });

            items = $('.home-stocks__item');
            width = track.outerWidth();
            count = items.length;
        };

        function animate() {
            move();
            requestAnimationFrame(animate);
        }

        function step() {

            var lastChild = $(items[items.length - 1]).data('item');
            var lastChildRect = $(items[items.length - 1])[0].getBoundingClientRect().x;

            if (lastChildRect <= $(window).width() - itemWidth / 2) {

                if (nextItemCount > lastChild) {
                    nextItemCount = $(items[0]).data('item');
                }

                nextItem = $(`.home-stocks__item[data-item="${nextItemCount}"]`).clone();

                $(`.home-stocks__item[data-item="${nextItemCount}"]`).remove();

                track.append(nextItem);
                translate -= itemWidth;

                items = $('.home-stocks__item');
                width = track.outerWidth();
                nextItemCount++;
            }
        };

        function move() {
            translate += velocity;
            step();
            track.css({
                transform: `translate3d(-${translate}px, 0, 0)`
            });
        }

        animate();
    }
    sliderInit();
}

// height

// $('#offers .offers-item').each(function() {
//     let itemHeight = $(this).outerWidth() - 150;
//     $(this).find('.bg').css({
//         'height' : `${itemHeight}px`
//     })
// })



});