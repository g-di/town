<style>
    .cy-box{
        background-color: #f8f8f8;
        padding: 0px;
    }
    .title{
        background-color: #ffffff;
        margin: 10px;
        margin-bottom: 6px;
        line-height: 1.42857143;
    }
</style>
<div class="news_news">
    <?php foreach ($info as $v): ?>
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
