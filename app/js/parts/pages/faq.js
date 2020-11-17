jQuery(document).ready(function($) {
    let faqItem = $('.faq-item');
    faqItem.click(function() {
        $(this).siblings('.open').removeClass('open');
        $(this).toggleClass('open');
    })
})