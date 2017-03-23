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
    }
    /**
     * 微信分享数据接口
     */
    public function shareapi() {
        $this->load->library('jssdk');
        $jssdk = new JSSDK("town", $this->appKey, $this->appSecret);
        $signPackage = $jssdk->GetSignPackage();
        return $signPackage;
    }
}