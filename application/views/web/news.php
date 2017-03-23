<div class="news">
    <!--新闻动态-->
    <div class="bceeeeee">
        <div class="news_c">
            <div class="new_tit">
                <div class="line">
                    <span>最新动态</span>
                </div>
            </div>
        </div>
        <?php foreach ($new as $k => $v): ?>
        <?php if ($k % 2 == 0): ?>
            <div class="news_con">
            <div class="news_co">
                <a href="/web/news-<?= $v['NewsID'] ?>.htm">
                    <img src="<?= $v['NewsPicUrl'] ?>" alt="" class="news_img"/>
                    <span class="news_in"><?= $v['NewsTitle'] ?></span>
                </a>
            </div>
        <?php else: ?>
            <div class="news_co">
                <a href="/web/news-<?= $v['NewsID'] ?>.htm">
                    <img src="<?= $v['NewsPicUrl'] ?>" alt="" class="news_img"/>
                    <span class="news_in"><?= $v['NewsTitle'] ?></span>
                </a>
            </div>
            <div style="clear: both"></div>
            </div>
        <?php endif; ?>
        <?php if ($k % 2 == 0 && $k == (count($new) - 1)): ?>
        <div style="clear: both"></div>
    </div>
    <?php endif; ?>
    <?php endforeach; ?>
</div>
<!--视频报道-->
<div class="news_report">
    <div class="news_c">
        <div class="new_tit">
            <div class="line">
                <span>视频报道</span>
                <a href="/web/channel-<?= $video_channel ?>.htm"><span class="news_more">更多</span></a>
            </div>
        </div>
    </div>
    <?php foreach ($video as $v): ?>
        <div class="news_con">
            <div class="news_video">
                <a href="/web/news-<?= $v['NewsID'] ?>.htm">
                    <img src="<?= $v['NewsPicUrl'] ?>" alt="" class="news_v"/>
                    <?= $v['NewsTitle'] ?>
                    <img src="/public/img/news_play.png" alt="" class="news_play"/>
                </a>
                <div class="news_ic">
                    <span><?= date('Y-m', strtotime($v['NewsPublishTime'])) ?></span>
                    <span>财经频道</span>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<!--小镇新闻-->
<div class="news_news">
    <div class="news_c">
        <div class="new_tit">
            <div class="line">
                <span>小镇新闻</span>
                <a href="/web/channel-<?= $town_channel ?>.htm"><span class="news_more">更多</span></a>
            </div>
        </div>
    </div>
    <?php foreach ($town as $k => $v): ?>
        <div class="news_con pb20">
            <a href="/web/news-<?= $v['NewsID'] ?>.htm">
                <div class="news_l">
                    <img src="<?= $v['NewsPicUrl'] ?>" alt="" class="news_nimg"/>
                    <?php if ($k == 0): ?>
                        <img src="/public/img/new_1.png" alt="" class="new_1"/>
                    <?php elseif ($k == 1): ?>
                        <img src="/public/img/new_2.png" alt="" class="new_2"/>
                    <?php endif; ?>
                </div>
                <div class="news_r">
                    <span><?= $v['NewsTitle'] ?></span>
                    <span><?= strip_tags(str_replace('　', '', $v['NewsContent'])) ?></span>
                </div>
            </a>
            <div style="clear: both"></div>
        </div>
    <?php endforeach; ?>
</div>
</div>