<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once 'base.php';

class So_visit_stat_model extends Base_model
{
    const visit = 'so_visit_stat';

    public function __construct()
    {
        parent::__construct();
    }

    public function add_visit($data)
    {
        return
            $this->db->insert(static::visit,$data);
    }
}