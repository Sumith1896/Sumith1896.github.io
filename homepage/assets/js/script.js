$(document).ready(function() {

    var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';

    $('.info-link').click(function() {
        $('.info-wrapper')
            .removeClass('hidden')
            .addClass('bounce-in')
            .on(animationEnd, function() {
                $('.info-wrapper')
                    .removeClass('bounce-in')
                    .off(animationEnd);
                
            });
        $('.info-mask').removeClass('hidden');
        $('.info-wrapper .info').addClass('fade-in').removeClass('fade-out');
        return false;
    });

    $('.info-close').click(function() {
        $('.info-wrapper')
            .addClass('bounce-out')
            .on(animationEnd, function() {
                $(this)
                    .addClass('hidden')
                    .removeClass('bounce-out')
                    .off(animationEnd);
                $('.info-mask').addClass('hidden');
            });
            $('.info-wrapper .info').addClass('fade-out').removeClass('fade-in');
        return false;
    });

    $('.info-close a').click(function() {
        event.stopPropagation();
    })

});

