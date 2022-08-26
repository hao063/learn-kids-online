$(document).ready(function () {
    let modalLogin = $(".modal-login");
    let modalRegister = $(".modal-register");

    $('.link-login').click(function () {
        $("body").css("overflow-y", "hidden");
        $(".bg-gray-modal").css("display", "block");
        modalLogin.css("visibility", "visible");
        modalLogin.animate({
            opacity: '1',
            marginTop: '-5px'
        });
    });

    $('.close-modal').click(function () {

        $("body").css("overflow-y", "");
        $(".bg-gray-modal").css("display", "none");
        modalLogin.css("visibility", "hidden");
        modalRegister.css("visibility", "hidden");
        modalLogin.animate({
            opacity: '0',
            marginTop: '',
        });
        modalRegister.animate({
            opacity: '0',
            marginTop: '',
        });
    });

    $('.login-btn').click(function () {
        modalLogin.css("opacity", "1");
        modalLogin.css("visibility", "visible");

        modalRegister.css("opacity", "0");
        modalRegister.css("visibility", "hidden");

    });

    $('.register-btn').click(function () {
        modalRegister.css("opacity", "1");
        modalRegister.css("visibility", "visible");

        modalLogin.css("opacity", "0");
        modalLogin.css("visibility", "hidden");

    });

    $(".email-input-login").change(function () {
        let val = $(this).val();
        let el = $(".validate-login-email-login");
        checkValidateEmail(el, val);
    });

    $(".email-input-register").change(function () {
        let val = $(this).val();
        let el = $(".validate-login-email2");
        checkValidateEmail(el, val);
    });

    function checkValidateEmail(el, val) {
        if (!val) {
            el.css("display", "block");
            el.html("Hãy nhập email");
        } else {
            if (!checkEmail(val)) {
                el.css("display", "block");
                el.html("Email không hợp lệ");
            }
        }
    }

    function checkEmail(email) {
        let re =
            /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        return re.test(email);
    }

    $('.password-input-login').keypress(function () {
        let iconPass = $(this);
        if (iconPass.val()) {
            $('.cnt-icon-login').addClass('cnt-icon-show');
        }
    });
    $('.password-input-login').change(function () {
        let iconPass = $(this);
        if (!iconPass.val()) {
            $('.cnt-icon-login').removeClass('cnt-icon-show');
            $('.cnt-icon-login').children('i').addClass('fa-eye');
            $('.cnt-icon-login').children('i').removeClass('fa-eye-slash');
            $('.password-input-login').attr('type', 'password');
        }
    });

    $('.input-password-register').keypress(function () {
        let iconPass = $(this);
        if (iconPass.val()) {
            $('.cnt-icon-register').addClass('cnt-icon-show');
        }
    });

    $('.input-password-register').change(function () {
        let iconPass = $(this);
        if (!iconPass.val()) {
            $('.cnt-icon-register').removeClass('cnt-icon-show');
            $('.cnt-icon-register').children('i').addClass('fa-eye');
            $('.cnt-icon-register').children('i').removeClass('fa-eye-slash');
            $('.input-password-register').attr('type', 'password');
        }
    });

    $('.cnt-icon-login').click(function () {
        let elP = $(this).children('p')
        let elIcon = $(this).children('i')
        if ($(this).hasClass('cnt-icon-show')) {
            if (elP.hasClass('show')) {
                elP.removeClass('show');
                elP.addClass('hide');
                elP.html('ẩn');
                elIcon.addClass('fa-eye-slash');
                elIcon.removeClass('fa-eye');
                $('.password-input-login').attr('type', 'text');
            } else {
                elP.addClass('show');
                elP.removeClass('hide');
                elP.html('hiện');
                elIcon.addClass('fa-eye');
                elIcon.removeClass('fa-eye-slash');
                $('.password-input-login').attr('type', 'password');
            }
        }
    });


    $('.cnt-icon-register').click(function () {
        let elP = $(this).children('p')
        let elIcon = $(this).children('i')
        if ($(this).hasClass('cnt-icon-show')) {
            if (elP.hasClass('show')) {
                elP.removeClass('show');
                elP.addClass('hide');
                elP.html('ẩn');
                elIcon.addClass('fa-eye-slash');
                elIcon.removeClass('fa-eye');
                $('.input-password-register').attr('type', 'text');
            } else {
                elP.addClass('show');
                elP.removeClass('hide');
                elP.html('hiện');
                elIcon.addClass('fa-eye');
                elIcon.removeClass('fa-eye-slash');
                $('.input-password-register').attr('type', 'password');
            }
        }
    });

    $('.color-login-mobile').click(function () {
        $('.tab-login-register-mobile').css('opacity', '0');
        $('.tab-login-register-mobile').css('visibility', 'hidden');
        $('body').css('overflow-y', '');
    });

    $('.btn-view-custom-mobile').click(function () {
        showCustom();
    });
    $('.click-login-link').click(function () {
        $('.menu-tab-mobile').css('transform', 'translate(-100%)');
        $("body").css("overflow-y", "hidden");
        showCustom();
    });

    function showCustom() {
        $('.tab-login-mobile').css('opacity', '1');
        $('.tab-login-mobile').css('visibility', 'visible');
        $('body').css('overflow-y', 'hidden');
    }

    $('.btn-click-link-register-mbi').click(function () {
        $('.tab-register-mobile').css('opacity', '1');
        $('.tab-register-mobile').css('visibility', 'visible');
        $('.tab-login-mobile').css('opacity', '0');
        $('.tab-login-mobile').css('visibility', 'hidden');
    });

    $('.btn-click-link-login-mbi').click(function () {
        showCustom();
        $("body").css("overflow-y", "hidden");
        $('.tab-register-mobile').css('opacity', '0');
        $('.tab-register-mobile').css('visibility', 'hidden');
    });


    $('.back-up-top').click(function() {
        $('html, body').animate({
            scrollTop:0
        },700)
    });
});