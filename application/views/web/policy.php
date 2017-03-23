<div class="policy">
    <?php foreach ($info as $v): ?>
        <div class="policy_c">
            <span>
                <i class="glyphicon glyphicon-calendar"></i> 发布时间:<?= $v['NewsPublishTime'] ?>
            </span>
            <a href="/web/news-<?= $v['NewsID'] ?>.htm">
                <div class="policy_con">
                    <div class="policy_left">
                        <div class="policy_cont">
                            <?= $v['NewsTitle'] ?>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    <?php endforeach; ?>
    <div class="policy_end"></div>
</div>