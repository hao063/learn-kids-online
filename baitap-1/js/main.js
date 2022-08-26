$(document).ready(function () {
    $('.btn-view-all').click(function () {
        $('.section-menu>nav').addClass('click-show-menu-all');
        $(".wrap-all-menu").attr("id", "wrap-all-menu-show");
        $("body").css("overflow-y", "hidden");
        $('.back-up-top').css("display", "none");
        $(".wrap-all-menu").animate({
            opacity: '1',
            marginTop: '-5px'
        });
    });

    function hiddenMenuAll() {
        $('.section-menu>nav').removeClass('click-show-menu-all');
        $(".wrap-all-menu").removeAttr("id");
        $(".wrap-all-menu").animate({
            opacity: '0',
            marginTop: '25px',
            visibility: 'hidden'
        });
        $('.btn-header-view-all').children('i').removeClass('fa-xmark');
        $('.btn-header-view-all').children('i').addClass('fa-bars');
    }

    $('.close-all-menu').click(function () {
        $("body").css("overflow-y", "");
        $('.back-up-top').css("display", "flex");
        hiddenMenuAll()
    });

    $('.btn-header-view-all').click(function () {
        if ($(this).children('i').hasClass('fa-bars')) {
            $(this).children('i').removeClass('fa-bars');
            $(this).children('i').addClass('fa-xmark');
            $('.back-up-top').css("display", "none");
        } else {
            hiddenMenuAll();
            $("body").css("overflow-y", "");
            $('.back-up-top').css("display", "flex");
        }
    });

    $('.btn-more-mobile-menu').click(function () {
        if ($(this).children('i').hasClass('fa-angle-down')) {
            let dataId = $(this).attr('data-id');
            $(this).children('i').removeClass('fa-angle-down');
            $(this).children('i').addClass('fa-angle-up');
            $(`.category-child-mbi-${dataId}`).addClass('category-child-mbi-show');
            $(`.category-child-mbi-${dataId}`).animate({
                opacity: '1',
                overflow: 'visible',
            },
                {
                    duration: 500,
                    fill: 'forwards'
                });
        } else {
            let dataId = $(this).attr('data-id');
            $(`.category-child-mbi-${dataId}`).removeClass('category-child-mbi-show');
            $(this).children('i').addClass('fa-angle-down');
            $(this).children('i').removeClass('fa-angle-up');
            $(`.category-child-mbi-${dataId}`).animate({
                opacity: '0',
                overflow: 'hidden',
            },
                {
                    duration: 500,
                    fill: 'forwards'
                });
        }
    });

    $('.btn-mobile-show-all').click(function () {
        $('.menu-tab-mobile').css('transform', 'translate(0)');
        $("body").css("overflow-y", "");
    });
    $('.btn-close-menu-all-mbi').click(function () {
        $('.menu-tab-mobile').css('transform', 'translate(-100%)');
        $("body").css("overflow-y", "");
    });

    $(".section").scroll(function () {
        if ($(this).scrollLeft() == 0) {
            $(".seperate").css('display', 'none');
        } else {
            $(".seperate").css('display', 'block');
        }
    });

    $('body').on('scroll', () => {
        // mobile
        let ofsetTop = $('.section-menu-mobile').offset().top;
        let mainofsetTop = Math.round($('#main').offset().top);
        if (ofsetTop < 0) {
            $('.section-menu-mobile').addClass('section-menu-mobile-pixed');
        } else if (ofsetTop == 0 && mainofsetTop == 53) {
            $('.section-menu-mobile').removeClass('section-menu-mobile-pixed');
        }
        // ipad

        let ofsetTopPc = $('.section-menu-pc').offset().top;
        if (ofsetTopPc < 0) {
            $('.section-menu-pc').addClass('section-menu-pc-pixed');
        } else if (ofsetTopPc == 0 && mainofsetTop == 80) {
            $('.section-menu-pc').removeClass('section-menu-pc-pixed');
        }


    })


});

