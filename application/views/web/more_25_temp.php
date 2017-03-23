<style>
    .cy-box{
        background-color: #f8f8f8;
        padding: 0px;
    }
    .title{
        background-color: #ffffff;
        padding: 10px;
        margin-bottom: 6px;
        line-height: 1.42857143;
    }
</style>
<?php foreach ($info as $k => $v): ?>
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