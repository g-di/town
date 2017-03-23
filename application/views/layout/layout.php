<!doctype html>
<html lang="zh">
<head>
    <meta charset="utf-8">
    <title><?= $title ?></title>
    <meta content="telephone=no" name="format-detection"/>
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0,user-scalable=no"/>
    <link href="http://cdn.bootcss.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://cdn.bootcss.com/Swiper/3.4.2/css/swiper.min.css" rel="stylesheet">
    <link href="/public/css/main.css" rel="stylesheet">
    <script src="http://cdn.bootcss.com/jquery/2.2.2/jquery.min.js"></script>
</head>
<body>
<div class="cy-header">
    <div class="search ">
        <button type="button" class="btn btn-default" data-toggle="modal" data-target=".bs-example-modal-sm"><span
                    class="glyphicon glyphicon-search"></span></button>
        <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
             style="display: none;">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <form method="post" action="../web/search.htm" id="forms" class="form-inline">
                        <div class="input-group">
                            <input type="text" name="search_keyword" class="form-control" placeholder="搜索"
                                   aria-describedby="basic-addon2">
                            <span class="input-group-addon" id="basic-addon2"><a
                                        class="glyphicon glyphicon-search cy-search"
                                        onclick="return submit_search();"> </a></span>
                            <input type="hidden" name="action" value="search">
                        </div>
                    </form>
                    <script>
                        function submit_search() {
                            $("#forms").submit();
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="swiper-container">
    <div class="swiper-wrapper">
        <?php foreach ($ad as $v): ?>
            <div class="swiper-slide">
                <a href="<?= $v['ad_url'] ?>">
                    <div class="infor_top">
                        <img src="<?= $v['ad_path'] ?>" class="index_main" alt="">
                        <?php if ($ad_show): ?>
                            <div><?= $v['ad_title'] ?></div>
                        <?php endif; ?>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?= $bodyHtml ?>
<div class="ifoot">
    <div class="ifoot_con">
        <img src="/public/img/code.jpg" alt="" class="mediaimg"/>
        <div class="ifoot_info">
            <div class="iinfo">
                <img src="/public/img/scan.png" alt=""/>
                <span>手机扫一扫微信公众号</span><br>
                <span class="fz10">获取更多北京基金小镇动态</span>
            </div>
            <div style="margin-bottom: 4px">
                <img src="/public/img/tel.png" alt=""/>
                <span>咨询热线：</span><br>
                <span class="fz10">010-57186668</span>
            </div>
            <img src="/public/img/date.png" alt=""/>
            <span>工作时间： 周一至周五</span><br>
            <span class="fz10">(AM:08:30-12:00 PM:13:30-17:00)</span>
        </div>
        <div style="clear: both"></div>
    </div>
</div>
<div class="foot">
    北京基金小镇　京ICP备16008758号-1
</div>
<script src="http://cdn.bootcss.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="http://cdn.bootcss.com/Swiper/3.4.2/js/swiper.jquery.min.js"></script>
<script src="/public/js/common.js"></script>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js" type="text/javascript"></script>
<script>
    var _hmt = _hmt || [];
    (function () {
        var hm = document.createElement("script");
        hm.src = "//hm.baidu.com/hm.js?03623793704c45fa01ac156bb6598946";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
    wx.config({
        debug: false,
        appId: '<?php echo $signPackage["appId"]; ?>',
        timestamp: '<?php echo $signPackage["timestamp"]; ?>',
        nonceStr: '<?php echo $signPackage["nonceStr"]; ?>',
        signature: '<?php echo $signPackage["signature"]; ?>',
        jsApiList: ['onMenuShareTimeline', 'onMenuShareAppMessage', 'onMenuShareQQ', 'onMenuShareQZone', 'onMenuShareWeibo']
    });
    var sharetit = '<?=$sharetit?>';
    var sharedesc = '<?=$sharedesc?>';
</script>
<script src="/public/js/share.js"></script>
</body>
</html>