jQuery(document).ready(function($) {

    const gutenCover = $('.wp-block-cover');
    console.log(gutenCover);
    if(gutenCover.lenght !== 0) {
        gutenCover.each(function() {
            let gutenCoverMargin = gutenCover.position().left;

            gutenCover.css({
                'transform': `translateX(-${gutenCoverMargin}px)`
            })
        })
    }

});