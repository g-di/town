<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once 'base.php';

class website_setup_model extends Base_model
{
    const ad = 'website_setup';

    public function __construct()
    {
        parent::__construct();
    }

    public function get_setup()
    {
        return
            $this->db->select('*')
                ->from(static::ad)
                ->limit(1)
                ->get()
                ->row_array();
    }
}