/**
 * Created by Administrator on 2016-9-26.
 */
//Navigation Scripts to Show Header on Scroll-up
jQuery(document).ready(function($){
    var MQL = 1170;

    //primary navigation slide-in effect
    if ($(window).width() > MQL) {
        var headerHeight = $('.navbar-custom').height();
        $(window).on('scroll',{
            previousTop: 0
        },
        function() {
            var currentTop = $(window).scrollTop();

            //if user is scrolling up
            if (currentTop < this.previousTop) {
                if (currentTop > 0 && $('.navbar-custom').hasClass('is-fixed')) {
                    $('.navbar-custom').addClass('is-visible');
                } else {
                    $('.navbar-custom').removeClass('is-visible is-fixed');
                }
            } else { //if scrolling down...
                $('.navbar-custom').removeClass('is-visible');
                if (currentTop > headerHeight && !$('.navbar-custom').hasClass('is-fixed')) {
                    $('.navbar-custom').addClass('is-fixed');
                }
            }
            this.previousTop = currentTop;
        }); 
    }

    //initialize tooltips
    $('[data-toggle="tooltip"]').tooltip();
})