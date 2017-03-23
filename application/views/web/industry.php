<div class="infor_con">
    <div class="infor_tit">
        <ul>
            <li class="active">基金在线</li>
            <li>行业聚焦</li>
            <li>金融资讯</li>
        </ul>
        <div style="clear: both"></div>
    </div>
    <div id="con0">
        <?php foreach ($online as $v): ?>
            <div class="infor_c">
                <a href="/web/news-<?= $v['NewsID'] ?>.htm">
                    <div class="infor_time">
                        <span><?= date('d', strtotime($v['NewsPublishTime'])) ?></span>
                        <span><?= date('Y-m', strtotime($v['NewsPublishTime'])) ?></span>
                    </div>
                    <div class="infor_cont">
                        <div><?= $v['NewsTitle'] ?></div>
                        <p><?= strip_tags(str_replace('　', '', $v['NewsContent'])) ?></p>
                    </div>
                </a>
                <div style="clear: both"></div>
            </div>
        <?php endforeach; ?>
    </div>
    <div id="con1" style="display: none">
        <?php foreach ($focus as $v): ?>
            <div class="infor_c">
                <a href="/web/news-<?= $v['NewsID'] ?>.htm">
                    <div class="infor_time">
                        <span><?= date('d', strtotime($v['NewsPublishTime'])) ?></span>
                        <span><?= date('Y-m', strtotime($v['NewsPublishTime'])) ?></span>
                    </div>
                    <div class="infor_cont">
                        <div><?= $v['NewsTitle'] ?></div>
                        <p><?= strip_tags(str_replace('　', '', $v['NewsContent'])) ?></p>
                    </div>
                </a>
                <div style="clear: both"></div>
            </div>
        <?php endforeach; ?>
    </div>
    <div id="con2" style="display: none;">
        <?php foreach ($info as $v): ?>
            <div class="infor_c">
                <a href="/web/news-<?= $v['NewsID'] ?>.htm">
                    <div class="infor_time">
                        <span><?= date('d', strtotime($v['NewsPublishTime'])) ?></span>
                        <span><?= date('Y-m', strtotime($v['NewsPublishTime'])) ?></span>
                    </div>
                    <div class="infor_cont">
                        <div><?= $v['NewsTitle'] ?></div>
                        <p><?= strip_tags(str_replace('　', '', $v['NewsContent'])) ?></p>
                    </div>
                </a>
                <div style="clear: both"></div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<script>
    $(function () {
        $('.infor_tit ul li').bind('click', function () {
            $('#con0,#con1,#con2').hide();
            $('#con' + $(this).index()).show();
            $('.infor_tit ul li').removeClass('active');
            $(this).addClass('active');
        });
    });
</script>