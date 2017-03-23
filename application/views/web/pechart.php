<script src="http://cdn.bootcss.com/echarts/3.4.0/echarts.min.js"></script>
<div class="green">
    <div class="green_top"></div>
    <!--数量统计-->
    <div class="green_c">
        <div class="green_l"></div>
        <div class="green_con">
            <span>私募基金管理人及私募基金数量统计</span>
            <hr/>
            <!--<img src="img/ch_3.jpg" alt="" class="w100"/>-->
            <div id="main" style="width: 100%;height: 300px;margin-bottom: -10px;"></div>
            <p>最新备案公示日期：<?=$update?></p>
        </div>
    </div>
    <script type="text/javascript">
        // 基于准备好的dom，初始化echarts实例
        var myChart = echarts.init(document.getElementById('main'));
        // 指定图表的配置项和数据
        var option = {
            title: {
                text: '统计',
                subtext: ''
            },
            grid: {
                left: '15%',
                right: '5%'
            },
            tooltip: {
                trigger: 'axis'
            },
            legend: {
                data: ['管理人', '私募基金']
            },
            toolbox: {
                show: true,
                top: 0,
                feature: {
                    mark: {show: true},
                    dataView: {show: true, readOnly: false},
                    magicType: {show: true, type: ['line', 'bar']}
//                            restore : {show: true},
//                            saveAsImage : {show: true}
                }
            },
            calculable: true,
            xAxis: [
                {
                    type: 'category',
                    data: [<?=$a_dat?>]
                }
            ],
            yAxis: [
                {
                    type: 'value',
                    max: 64006
                }
            ],
            series: [
                {
                    name: '管理人',
                    type: 'bar',
                    data: [<?=$a_glr?>],
                    markPoint: {
                        data: [
                            //            {type : 'max', name: '最大值'},
                            //            {type : 'min', name: '最小值'}
                        ]
                    },
                    markLine: {
                        data: [
                            //            {type : 'average', name: '平均值'}
                        ]
                    },
                    itemStyle: {normal: {label: {show: true, position: 'top'}}}
                },
                {
                    name: '私募基金',
                    type: 'bar',
                    data: [<?=$a_smjj?>],
                    markPoint: {
                        data: [
                            //            {name : '年最高', value : 182.2, xAxis: 7, yAxis: 183},
                            //            {name : '年最低', value : 2.3, xAxis: 11, yAxis: 3}
                        ]
                    },
                    markLine: {
                        data: [
                            //            {type : 'average', name : '平均值'}
                        ]
                    },
                    itemStyle: {normal: {label: {show: true, position: 'top'}}}
                }
            ]
        };
        // 使用刚指定的配置项和数据显示图表。
        myChart.setOption(option);
    </script>
    <!--地域分布-->
    <div class="green_c">
        <div class="green_l"></div>
        <div class="green_con">
            <span>私募基金管理人地域分布</span>
            <hr/>
            <!--<img src="img/ch_1.jpg" alt="" class="w100"/>-->
            <div id="main_area" style="width: 100%;height: 260px;margin-bottom: -40px;"></div>
        </div>
        <script type="text/javascript">
            // 基于准备好的dom，初始化echarts实例
            var myChart = echarts.init(document.getElementById('main_area'));

            // 指定图表的配置项和数据
            var option = {
                tooltip: {
                    trigger: 'item',
                    formatter: "{b}: {c} ({d}%)"
                },
                legend: {
//                        orient: 'vertical',
                    x: 'left',
                    data: [<?=$b_arr?>]
                },
                series: [
                    {
                        name: '访问来源',
                        type: 'pie',
                        radius: ['0%', '50%'],
                        avoidLabelOverlap: false,
                        label: {
                            normal: {
                                show: true,
                                formatter: "{b}{d}%",
                                position: 'outside'
                            },
                            emphasis: {
                                show: true,
                                textStyle: {
                                    fontSize: '16',
                                    fontWeight: 'bold'
                                }
                            }
                        },
                        labelLine: {
                            normal: {
                                show: true
                            }
                        },
                        data: [<?=$b_table?>]
                    }
                ]
            };
            // 使用刚指定的配置项和数据显示图表。
            myChart.setOption(option);
        </script>
    </div>
    <!--基金数量-->
    <div class="green_c">
        <div class="green_l"></div>
        <div class="green_con">
            <span>私募基金数量</span>
            <hr/>
            <!--<img src="img/ch_2.jpg" alt="" class="w100"/>-->
            <div id="main2" style="width: 100%;height: 500px;margin-bottom: -150px;"></div>
        </div>
        <script type="text/javascript">
            // 基于准备好的dom，初始化echarts实例
            var myChart = echarts.init(document.getElementById('main2'));

            // 指定图表的配置项和数据
            var option = {
                tooltip: {
                    trigger: 'item',
                    formatter: "{b}: {c} ({d}%)"
                },
                legend: {
//                    orient: 'vertical',
                    x: 'left',
                    data: [<?=$c_arr?>]
                },
                series: [
                    {
                        name: '基金类型',
                        type: 'pie',
                        selectedMode: 'single',
                        radius: [0, '30%'],

                        label: {
                            normal: {
                                position: 'inner'
                            }
                        },
                        labelLine: {
                            normal: {
                                show: false
                            }
                        },
                        data: [
                            {value: 27212, name: '证券投资', selected: true},
                            {value: 16406, name: '股权投资'},
                            {value: 2402, name: '创业投资'}
                        ]
                    },
                    {
                        name: '基金来源',
                        type: 'pie',
                        radius: ['40%', '55%'],

                        data: [<?=$c_table?>]
                    }
                ]
            };
            // 使用刚指定的配置项和数据显示图表。
            myChart.setOption(option);
        </script>
    </div>
</div>
<img src="<?= $d_file ?>" class="index_main ch_bot" alt=""/>
<div class="green_c">
    <p class="ch_end"> [数据来源：中国基金业协会]</p>
</div>