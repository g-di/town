wx.ready(function () {
    wx.onMenuShareTimeline({
        title: sharetit,
        link: window.location.href,
        imgUrl: window.location.origin + '/public/share/weixin-share-logo.png',
        success: function () {
            // 用户确认分享后执行的回调函数
        },
        cancel: function () {
            // 用户取消分享后执行的回调函数
        }
    });
    wx.onMenuShareAppMessage({
        title: sharetit,
        desc: sharedesc,
        link: window.location.href,
        imgUrl: window.location.origin + '/public/share/weixin-share-logo.png',
        type: '',
        dataUrl: '',
        success: function () {
            // 用户确认分享后执行的回调函数
        },
        cancel: function () {
            // 用户取消分享后执行的回调函数
        }
    });
    wx.onMenuShareQQ({
        title: sharetit, // 分享标题
        desc: sharedesc, // 分享描述
        link: window.location.href, // 分享链接
        imgUrl: window.location.origin + '/public/share/weixin-share-logo.png', // 分享图标
        success: function () {
            // 用户确认分享后执行的回调函数
        },
        cancel: function () {
            // 用户取消分享后执行的回调函数
        }
    });
    wx.onMenuShareQZone({
        title: sharetit, // 分享标题
        desc: sharedesc, // 分享描述
        link: window.location.href, // 分享链接
        imgUrl: window.location.origin + '/public/share/weixin-share-logo.png', // 分享图标
        success: function () {
            // 用户确认分享后执行的回调函数
        },
        cancel: function () {
            // 用户取消分享后执行的回调函数
        }
    });
    wx.onMenuShareWeibo({
        title: sharetit, // 分享标题
        desc: sharedesc, // 分享描述
        link: window.location.href, // 分享链接
        imgUrl: window.location.origin + '/public/share/weixin-share-logo.png', // 分享图标
        success: function () {
            // 用户确认分享后执行的回调函数
        },
        cancel: function () {
            // 用户取消分享后执行的回调函数
        }
    });
});
wx.error(function (res) {
    // alert(res.errMsg);
});