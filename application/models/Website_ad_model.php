<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once 'base.php';

class website_ad_model extends Base_model
{
    const ad = 'website_ad';

    public function __construct()
    {
        parent::__construct();
    }

    public function get_ad($where,$order)
    {
        return
            $this->db->select('ad_title,ad_path,ad_url')
                ->from(static::ad)
                ->where($where)
                ->order_by($order)
                ->get()
                ->result_array();
    }
}