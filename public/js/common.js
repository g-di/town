$(function () {
    //轮播图
    var mySwiper = new Swiper('.swiper-container', {
        autoplay: 2000,
        loop: true,
        autoHeight: true
    })
    //回到顶部
    $(window).scroll(function () {
        if ($(window).scrollTop() > 100) {
            if ($('#go-top').size() <= 0) {
                html = '<img src="/public/img/go_top.png" id="go-top" style="position: fixed;width: 60px;bottom: 24px;right: 20px;"/>';
                $('body').append(html);
                $('#go-top').bind('click', function () {
                    $('body,html').animate({
                        scrollTop: 0
                    }, 500);
                });
            }
        } else {
            $('#go-top').remove();
        }
    });
});