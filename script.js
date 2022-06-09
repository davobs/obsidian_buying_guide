setTimeout(function() {
    if (jQuery('.box-content').outerHeight() > 160) {
        jQuery('.box-content').css('max-height', '165px');
        jQuery('.more-guid').css('visibility', 'visible');
    }
}, 500);

jQuery('.more-guid img').click(function() {
    jQuery(this).toggleClass('guid-less');
    jQuery(this).parent().toggleClass('collapse-guid');
    jQuery('.box-content').toggleClass('all-guide');
});