<?php

/**
 * User: gd
 * Date: 2017/3/20
 * Time: 17:16;
 */
require_once 'base/base.php';

class Web extends Base
{
    private $ADCatArr;
    private $diyu_arr = array(1 => '北京', '上海', '深圳', '浙江', '江苏', '广东', '天津', '其他');
    private $smjjsl_arr = array(1 => '证券投资', '股权投资', '创业投资', '其他投资', '基金专户', '基金子公司', '证券公司', '期货公司', '保险公司', '信托计划', '银行理财', 'QFII', '其他');

    function __construct()
    {
        parent::__construct();
        $this->load->model('news_model');//新闻
        $this->load->model('website_ad_model');//轮播图
        $this->load->model('so_company_fund_model');//小镇指数
        $this->load->model('so_jjzs_model');//中国基金指数
        $this->load->model('website_setup_model');//版权信息等
        $this->ADCatArr = $this->config->item('ADCatArr');
    }

    /**
     * 简介
     * catid = 10
     * channelID = 4
     */
    public function introduction()
    {
        $this->visit(4);
        $data['sharetit'] = $data['title'] = '北京基金小镇 - 简介';
        //轮播图
        $where = array(
            'catid' => 10,
            'state' => 1
        );
        $data['ad'] = $this->website_ad_model->get_ad($where, 'xuhao asc');
        $data['ad_show'] = $this->ADCatArr[10]['display_title'];
        //分享内容
        $data['signPackage'] = $this->shareapi();
        $share = $this->website_channel_model->get_channel(array('ChannelID' => 4));
        $data['sharedesc'] = $share['ChannelDescription'];
        $data['bodyHtml'] = $this->load->view('/web/introduction', $data, true);
        $this->load->view('/layout/layout', $data);
    }

    /**
     * 小镇指数
     * catid = 40
     * channelID = 7
     */
    public function setting()
    {
        $this->visit(7);
        $data['sharetit'] = $data['title'] = '北京基金小镇 - 小镇指数';
        //轮播图
        $where = array(
            'catid' => 40,
            'state' => 1
        );
        $data['ad'] = $this->website_ad_model->get_ad($where, 'xuhao asc');
        $data['ad_show'] = $this->ADCatArr[40]['display_title'];
        //获取总数
        $data['sum'] = $this->so_company_fund_model->get_company_count();
        $fund_capital = str_split(floor($data['sum']['fund_capital']));
        $data['sum']['fund_capital'] = $fund_capital;
        $data['sum']['fund_num'] = str_split($data['sum']['fund_num']);
        //获取公司
        $where = array(
            'if_show' => 1,
            'reg_date >=' => '2015-0-0',
            'reg_date <' => '2016-0-0'
        );
        $data['data2015'] = $this->so_company_fund_model->get_company($where, 'reg_date asc');
        $where = array(
            'if_show' => 1,
            'reg_date >=' => '2016-0-0',
            'reg_date <' => '2017-0-0'
        );
        $data['data2016'] = $this->so_company_fund_model->get_company($where, 'reg_date asc');
        $where = array(
            'if_show' => 1,
            'reg_date >=' => '2017-0-0',
            'reg_date <' => '2018-0-0'
        );
        $data['data2017'] = $this->so_company_fund_model->get_company($where, 'reg_date asc');
        //分享内容
        $data['signPackage'] = $this->shareapi();
        $share = $this->website_channel_model->get_channel(array('ChannelID' => 7));
        $data['sharedesc'] = $share['ChannelDescription'];
        $data['bodyHtml'] = $this->load->view('/web/setting', $data, true);
        $this->load->view('/layout/layout', $data);
    }

    /**
     * 小镇活动
     * catid = 50
     * channelID = 10
     */
    public function activities()
    {
        $this->visit(10);
        $data['sharetit'] = $data['title'] = '北京基金小镇 - 小镇活动';
        //轮播图
        $where = array(
            'catid' => 50,
            'state' => 1
        );
        $data['ad'] = $this->website_ad_model->get_ad($where, 'xuhao asc');
        $data['ad_show'] = $this->ADCatArr[50]['display_title'];

        $limit = '20';
        //最新动态
        $where = array(
            'NewsCat' => 36,
            'IfDeleted' => 0,
            'NewsState' => 1
        );
        $data['new'] = $this->news_model->get_news($where, 'NewsPublishTime desc', $limit);
        //分享内容
        $data['signPackage'] = $this->shareapi();
        $share = $this->website_channel_model->get_channel(array('ChannelID' => 10));
        $data['sharedesc'] = $share['ChannelDescription'];
        $data['bodyHtml'] = $this->load->view('/web/activities', $data, true);
        $this->load->view('/layout/layout', $data);
    }

    /**
     * 新闻中心
     * catid = 30
     * channelID = 6
     */
    public function news($i)
    {
        if (isset($i) && is_numeric($i)) {
            //更新阅读数
            $where = array(
                'NewsID' => $i
            );
            $this->news_model->update_news($where);
            $where = array(
                'news.NewsID' => $i,
                'IfDeleted' => 0
            );
            $info = $this->news_model->get_news($where, 'NewsPublishTime desc', '1');
            $info = $info[0];
            $this->visit($info['NewsCat'],$i);
            if ($info['news_link_to']) {
                header('Location: ' . $info['news_link_to']);
                return;
            }

            switch ($info['NewsCat']) {
                case '23':
                    $data['title'] = '北京基金小镇 - 最新动态';
                    $data['tit'] = '最新动态';
                    break;
                case '24':
                    $data['title'] = '北京基金小镇 - 视频报道';
                    $data['tit'] = '视频报道';
                    break;
                case '25':
                    $data['title'] = '北京基金小镇 - 小镇新闻';
                    $data['tit'] = '小镇新闻';
                    break;
                case '28':
                    $data['title'] = '基金圈 - 基金在线';
                    $data['tit'] = '基金在线';
                    break;
                case '29':
                    $data['title'] = '基金圈 - 行业聚焦';
                    $data['tit'] = '行业聚焦';
                    break;
                case '30':
                    $data['title'] = '基金圈 - 金融资讯';
                    $data['tit'] = '金融资讯';
                    break;
                default:
                    $data['title'] = '基金圈';
                    $data['tit'] = '基金圈';
                    break;
            }
            $data['setup'] = $this->website_setup_model->get_setup();

            $data['other'] = $info;
            //分享内容
            $data['signPackage'] = $this->shareapi();
            $data['sharetit'] = $info['NewsTitle'] . ' - 北京基金小镇';
            $data['sharedesc'] = strip_tags(str_replace('　', '', mb_substr($info['NewsContent'], 0, 50))) . '...';

            $data['temp'] = $this->load->view('/web/news_temp', $data, true);
            $data['bodyHtml'] = $this->load->view('/layout/layouts', $data, true);
            $this->load->view('/layout/layout', $data);
        } else {
            $this->visit(6);
            //轮播图
            $where = array(
                'catid' => 30,
                'state' => 1
            );
            $data['ad'] = $this->website_ad_model->get_ad($where, 'xuhao asc');
            $data['ad_show'] = $this->ADCatArr[30]['display_title'];
            //最新动态
            $limit = '20';
            $where = array(
                'NewsCat' => 23,
                'IfDeleted' => 0,
                'NewsState' => 1
            );
            $data['new'] = $this->news_model->get_news($where, 'NewsPublishTime desc', $limit);
            //视频报道
            $limit = '2';
            $where = array(
                'NewsCat' => 24,
                'IfDeleted' => 0,
                'NewsState' => 1
            );
            $data['video_channel'] = 24;
            $data['video'] = $this->news_model->get_news($where, 'NewsPublishTime desc', $limit);
            //小镇新闻
            $limit = '10';
            $where = array(
                'NewsCat' => 25,
                'IfDeleted' => 0,
                'NewsState' => 1
            );
            $data['town_channel'] = 25;
            $data['town'] = $this->news_model->get_news($where, 'NewsPublishTime desc', $limit);
            $data['sharetit'] = $data['title'] = '北京基金小镇 - 新闻中心';
            //分享内容
            $data['signPackage'] = $this->shareapi();
            $share = $this->website_channel_model->get_channel(array('ChannelID' => 6));
            $data['sharedesc'] = $share['ChannelDescription'];
            $data['bodyHtml'] = $this->load->view('/web/news', $data, true);
            $this->load->view('/layout/layout', $data);
        }
    }

    /**
     * 更多
     * channelID = $i
     */
    public function channel($i)
    {
        $where = array(
            'IfDeleted' => 0,
            'NewsState' => 1
        );
        switch ($i) {
            case 24:
                $data['sharetit'] = $data['title'] = '北京基金小镇 - 媒体报道';
                $where['NewsCat'] = 24;
                $data['tit'] = '媒体报道';
                break;
            case 25:
                $data['sharetit'] = $data['title'] = '北京基金小镇 - 小镇新闻';
                $where['NewsCat'] = 25;
                $data['tit'] = '小镇新闻';
                break;
            default:
                header('Location: ' . getenv('HTTP_REFERER'));
                break;
        }
        $this->visit($i);
        //视频报道
        $limit = '50';
        $data['info'] = $this->news_model->get_news($where, 'NewsPublishTime desc', $limit);
        //分享内容
        $data['signPackage'] = $this->shareapi();
        $share = $this->website_channel_model->get_channel(array('ChannelID' => $i));
        $data['sharedesc'] = $share['ChannelDescription'];

        $data['temp'] = $this->load->view('/web/more_' . $i . '_temp', $data, true);
        $data['bodyHtml'] = $this->load->view('/layout/layouts', $data, true);
        $this->load->view('/layout/layout', $data);
    }

    /**
     * 中国量化基金指数
     * channelID = 63
     */
    public function quantization()
    {
        $this->visit(63);
        $data['sharetit'] = $data['title'] = '北京基金小镇 - 中国量化基金指数';
        //分享内容
        $data['signPackage'] = $this->shareapi();
        $share = $this->website_channel_model->get_channel(array('ChannelID' => 63));
        $data['sharedesc'] = $share['ChannelDescription'];
        $data['bodyHtml'] = $this->load->view('/web/quantization', $data, true);
        $this->load->view('/layout/layout', $data);
    }

    /**
     * 政策
     * catid = 65
     * channelID = 31
     * NewsCat = 31
     */
    public function policy()
    {
        $this->visit(31);
        $data['sharetit'] = $data['title'] = '基金圈 - 政策';
        //轮播图
        $where = array(
            'catid' => 65,
            'state' => 1
        );
        $data['ad'] = $this->website_ad_model->get_ad($where, 'xuhao asc');
        $data['ad_show'] = $this->ADCatArr[65]['display_title'];
        //金融资讯
        $limit = 30;
        $where = array(
            'NewsCat' => 31,
            'IfDeleted' => 0,
            'NewsState' => 1
        );
        $data['info'] = $this->news_model->get_news($where, 'NewsPublishTime desc', $limit);
        //分享内容
        $data['signPackage'] = $this->shareapi();
        $share = $this->website_channel_model->get_channel(array('ChannelID' => 31));
        $data['sharedesc'] = $share['ChannelDescription'];
        $data['bodyHtml'] = $this->load->view('/web/policy', $data, true);
        $this->load->view('/layout/layout', $data);
    }

    /**
     * 资讯
     * catid = 60
     * channelID = 8
     */
    public function industry()
    {
        $this->visit(8);
        $data['sharetit'] = $data['title'] = '基金圈 - 资讯';
        //轮播图
        $where = array(
            'catid' => 60,
            'state' => 1,
        );
        $data['ad'] = $this->website_ad_model->get_ad($where, 'xuhao asc');
        $data['ad_show'] = $this->ADCatArr[60]['display_title'];
        $limit = '20';
        //基金在线
        $where = array(
            'NewsCat' => 28,
            'IfDeleted' => 0,
            'NewsState' => 1
        );
        $data['online'] = $this->news_model->get_news($where, 'NewsPublishTime desc', $limit);
        //行业聚焦
        $where = array(
            'NewsCat' => 29,
            'IfDeleted' => 0,
            'NewsState' => 1
        );
        $data['focus'] = $this->news_model->get_news($where, 'NewsPublishTime desc', $limit);
        //金融资讯
        $where = array(
            'NewsCat' => 30,
            'IfDeleted' => 0,
            'NewsState' => 1
        );
        $data['info'] = $this->news_model->get_news($where, 'NewsPublishTime desc', $limit);
        //分享内容
        $data['signPackage'] = $this->shareapi();
        $share = $this->website_channel_model->get_channel(array('ChannelID' => 8));
        $data['sharedesc'] = $share['ChannelDescription'];
        $data['bodyHtml'] = $this->load->view('/web/industry', $data, true);
        $this->load->view('/layout/layout', $data);
    }

    /**
     * 中国基金指数
     * channelID = 9
     */
    public function pechart()
    {
        $this->visit(9);
        $data['sharetit'] = $data['title'] = '基金圈 - 中国基金指数';
        $where = array();
        $order = 'update_date desc';
        $limit = 5;
        $jjzs = $this->so_jjzs_model->get_jjzs($where, $order, $limit);

        $show_b_table = $show_c_table = '';
        foreach ($jjzs as $k => $v) {
            if (!$k) {
                //第一个，最新的
                $show_max_smjj = $v['a_smjj'] + 5000;
                $data['update'] = $v['update_date'];
                $data['d_file'] = $v['d_file'];
                //地区分布
                for ($i = 1; $i <= 8; $i++) {
                    ${"b_" . $i} = $v["b_" . $i];
                    $data['b_arr'] .= '"' . $this->diyu_arr[$i] . '",';

                    $show_b_table .= "{value:" . ${"b_" . $i} . ", name:'" . $this->diyu_arr[$i] . "'},\r\n";
                }
                //私募基金数量
                for ($i = 1; $i <= 13; $i++) {
                    ${"c_" . $i} = $v["c_" . $i];
                    $data['c_arr'] .= '"' . $this->smjjsl_arr[$i] . '",';

                    $show_c_table .= "{value:" . ${"c_" . $i} . ", name:'" . $this->smjjsl_arr[$i] . "'},\r\n";

                }
            }
            $a_date_arr[] = date("Y-m", strtotime($v['update_date'])) . "";
            $a_glr_arr[] = $v['a_glr'] . "";
            $a_smjj_arr[] = $v['a_smjj'] . "";
        }

        //顺序对调
        $a_date_arr = array_reverse($a_date_arr);
        $a_glr_arr = array_reverse($a_glr_arr);
        $a_smjj_arr = array_reverse($a_smjj_arr);

        $data['a_dat'] = "'" . join("','", $a_date_arr) . "'";
        $data['a_glr'] = join(",", $a_glr_arr);
        $data['a_smjj'] = join(",", $a_smjj_arr);
        $data['b_table'] = $show_b_table;
        $data['c_table'] = $show_c_table;
        //分享内容
        $data['signPackage'] = $this->shareapi();
        $share = $this->website_channel_model->get_channel(array('ChannelID' => 9));
        $data['sharedesc'] = $share['ChannelDescription'];

        $data['bodyHtml'] = $this->load->view('/web/pechart', $data, true);
        $this->load->view('/layout/layout', $data);
    }

    /**
     * 小镇服务 - 联系小镇
     * catid = 70
     */
    public function contact()
    {
        $this->visit(13);
        $data['sharetit'] = $data['title'] = '小镇服务 - 联系小镇';
        //轮播图
        $where = array(
            'catid' => 70,
            'state' => 1,
        );
        $data['ad'] = $this->website_ad_model->get_ad($where, 'xuhao asc');
        $data['ad_show'] = $this->ADCatArr[70]['display_title'];
        //分享内容
        $data['signPackage'] = $this->shareapi();
        $share = $this->website_channel_model->get_channel(array('ChannelID' => 13));
        $data['sharedesc'] = $share['ChannelDescription'];
        $data['bodyHtml'] = $this->load->view('/web/contact', $data, true);
        $this->load->view('/layout/layout', $data);
    }

    /**
     * 搜索
     */
    public function search()
    {
        $post = $this->input->post();
        $search_keyword = is_array($post['search_keyword']) ? implode($post['search_keyword']) : $post['search_keyword'];
        $keyword = $search_keyword ? htmlentities($search_keyword, ENT_QUOTES, "UTF-8") : '';
        if ($keyword == '') {
            header('Location: ' . getenv('HTTP_REFERER'));
        } else {
            $where = array(
                'NewsState' => 1,
            );
            $order = 'NewsPublishTime DESC';
            $data['res'] = $this->news_model->search_news($where, $order, $keyword);
            if (count($data['res']) == 0) {
                $data['search'] = '没有检索到符合条件的内容。';
            }
            $data['title'] = '北京基金小镇 - 查询结果';
            $data['tit'] = '查询结果';
            //分享内容
            $data['signPackage'] = $this->shareapi();
            $data['sharetit'] = '北京基金小镇';
            $data['sharedesc'] = '';
            $data['temp'] = $this->load->view('/web/search_temp', $data, true);
            $data['bodyHtml'] = $this->load->view('/layout/layouts', $data, true);
            $this->load->view('/layout/layout', $data);
        }
    }

    /**
     * 环境人文
     */
    public function environment(){
        $this->visit(5);
        $data['title'] = '北京基金小镇 - 环境人文';
        //分享内容
        $data['signPackage'] = $this->shareapi();
        $share = $this->website_channel_model->get_channel(array('ChannelID' => 5));
        $data['sharedesc'] = $share['ChannelDescription'];
//        $data['bodyHtml'] = $this->load->view('/web/contact', $data, true);
        $data['bodyHtml'] = '环境人文';
        $this->load->view('/layout/layout', $data);
    }
    /**
     * 小镇政策
     */
    public function enroll(){
        $this->visit(11);
        $data['title'] = '小镇服务 - 小镇政策';
        //分享内容
        $data['signPackage'] = $this->shareapi();
        $share = $this->website_channel_model->get_channel(array('ChannelID' => 11));
        $data['sharedesc'] = $share['ChannelDescription'];
//        $data['bodyHtml'] = $this->load->view('/web/contact', $data, true);
        $data['bodyHtml'] = '小镇政策';
        $this->load->view('/layout/layout', $data);
    }
    /**
     * 我要入驻
     */
    public function consult(){
        $this->visit(12);
        $data['title'] = '小镇服务 - 我要入驻';
        //分享内容
        $data['signPackage'] = $this->shareapi();
        $share = $this->website_channel_model->get_channel(array('ChannelID' => 12));
        $data['sharedesc'] = $share['ChannelDescription'];
//        $data['bodyHtml'] = $this->load->view('/web/contact', $data, true);
        $data['bodyHtml'] = '我要入驻';
        $this->load->view('/layout/layout', $data);
    }
}