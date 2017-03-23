<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once 'base.php';

class so_jjzs_model extends Base_model
{
    const jjzs = 'so_jjzs';

    public function __construct()
    {
        parent::__construct();
    }

    public function get_jjzs($where, $order, $limit)
    {
        return
            $this->db->select('*')
                ->from(static::jjzs)
                ->where($where)
                ->limit($limit)
                ->order_by($order)
                ->get()
                ->result_array();
    }

}