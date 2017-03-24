<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Base extends CI_Controller
{

    var $appKey = "wxf0bd3161397d3efb";
    var $appSecret = "1176398e4436f2b25412ffc1399cfa11";
//    var $appKey = "wxceb46abe3946876d";
//    var $appSecret = "86149849f08518f2ca00d739626c11d2";
    var $appName = "town";

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->config('common');
        $this->load->model('website_channel_model');//微信分享
        $this->load->model('so_visit_stat_model');//点击
    }

    /**
     * 微信分享数据接口
     */
    public function shareapi()
    {
        $this->load->library('jssdk');
        $jssdk = new JSSDK("town", $this->appKey, $this->appSecret);
        $signPackage = $jssdk->GetSignPackage();
        return $signPackage;
    }

    /**
     * 访问添加数据
     * ChannelID
     */
    public function visit($channel_id, $news_id = 0)
    {
        $cid = $channel_id;
        while ($cid > 3){
            $res = $this->website_channel_model->get_parentid($cid);
            $cid = $res['ChannelParentID'];
        }

        $visit_ip = $_SERVER['REMOTE_ADDR'];
        $user_agent = $_SERVER['HTTP_USER_AGENT'];

        $data = array(
            'visit_date' => date('Y-m-d', time()),
            'visit_ip' => $visit_ip,
            'news_id' => $news_id,
            'channel_id' => $channel_id,
            'visit_datetime' => date('Y-m-d H:i:s', time()),
            'top_channel_id' => $cid,
            'user_agent' => $user_agent,
            'stat_source' => 'weixin'
        );

        $this->so_visit_stat_model->add_visit($data);
    }
}