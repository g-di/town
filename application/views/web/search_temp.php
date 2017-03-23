<style>
    .search_info {
        background: #ffffff;
        margin-top: 15px;
    }

    .search_c {
        border: 1px solid #ddd;
        margin-bottom: 10px;
        padding: 10px 15px;
    }

    .search_con span {
        font-size: 13px;
        color: #6CF;
    }
    .search_error{
        margin: 28% 0;
        text-align: center;
    }
</style>
<div class="search_info">
    <?php if (isset($search)): ?>
        <div class="search_error"><?= $search ?></div>
    <?php else: ?>
        <?php foreach ($res as $v): ?>
            <div class="search_c">
                <a href="/web/news-<?= $v['NewsID'] ?>.htm">
                    <div class="search_con">
                        <div><?= $v['NewsTitle'] ?></div>
                        <span><?= $v['NewsPublishTime'] ?></span>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>