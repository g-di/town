<div class="main">
    <div class="main_top">
        <div class="main_topc">
            <div class="main_topc1 main_topc2">
                <div style="width: 104px;" class="main_topco1">
                    <span class="main_topt1">入驻基金机构</span><br>
                    <?php foreach ($sum['fund_num'] as $k => $v): ?>
                        <div class="main_topcon1 main_up<?= $k * 2 ?>">
                            <ul>
                                <?= $v ?>
                                <li>0</li>
                                <li>1</li>
                                <li>2</li>
                                <li>3</li>
                                <li>4</li>
                                <li>5</li>
                                <li>6</li>
                                <li>7</li>
                                <li>8</li>
                                <li>9</li>
                                <?= $v ?>
                            </ul>
                        </div>
                    <?php endforeach; ?>
                    <span class="main_topt2">家</span>
                </div>
            </div>
            <div class="main_topc1">
                <div style="width: 146px;" class="main_topco1">
                    <span class="main_topt1">资产管理规模</span><br>
                    <?php foreach ($sum['fund_capital'] as $k => $v): ?>
                        <div class="main_topcon1 main_up<?= $k * 2 ?>">
                            <ul>
                                <?= $v ?>
                                <li>0</li>
                                <li>1</li>
                                <li>2</li>
                                <li>3</li>
                                <li>4</li>
                                <li>5</li>
                                <li>6</li>
                                <li>7</li>
                                <li>8</li>
                                <li>9</li>
                                <?= $v ?>
                            </ul>
                        </div>
                    <?php endforeach; ?>
                    <span class="main_topt2">亿元</span>
                </div>
            </div>
            <div style="clear: both"></div>
        </div>
    </div>
    <div class="main_con">
        <div class="main_cont">入驻机构（按入驻时间排序）</div>
        <div class="main_date">
            <span class="main_r1 active">2017年</span><span class="main_r1">2016年</span><span>2015年</span>
        </div>
        <div class="main_conc" id="main_conc0">
            <?php foreach ($data2017 as $v): ?>
                <div class="main_concon"><?= $v['fund_name'] ?></div>
            <?php endforeach; ?>
        </div>
        <div class="main_conc" id="main_conc1" style="display: none">
            <?php foreach ($data2016 as $v): ?>
                <div class="main_concon"><?= $v['fund_name'] ?></div>
            <?php endforeach; ?>
        </div>
        <div class="main_conc" id="main_conc2" style="display: none">
            <?php foreach ($data2015 as $v): ?>
                <div class="main_concon"><?= $v['fund_name'] ?></div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<script>
    $(function () {
        $('.main_date span').bind('click', function () {
            $('.main_date span').removeClass('active');
            $(this).addClass('active');
            $('#main_conc0,#main_conc1,#main_conc2').hide();
            $('#main_conc' + $(this).index()).show();
        });
        setTimeout(function () {
            $('.main_topcon1 ul').addClass('active')
        }, 500);
    })
</script>