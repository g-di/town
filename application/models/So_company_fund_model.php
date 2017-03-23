<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once 'base.php';

class so_company_fund_model extends Base_model
{
    const company = 'so_company_fund';

    public function __construct()
    {
        parent::__construct();
    }

    public function get_company($where, $order)
    {
        return
            $this->db->select('fund_name')
                ->from(static::company)
                ->where($where)
                ->order_by($order)
                ->get()
                ->result_array();
    }

    public function get_company_count($where=array()){
        return
        $this->db->select('count(*) as fund_num, sum(management_capital) as fund_capital')
            ->from(static::company)
            ->where($where)
            ->get()
            ->row_array();
    }

}