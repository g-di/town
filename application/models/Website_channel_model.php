<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once 'base.php';

class Website_channel_model extends Base_model
{
    const channel = 'website_channel';

    public function __construct()
    {
        parent::__construct();
    }

    public function get_channel($where)
    {
        return
            $this->db->select('*')
                ->from(static::channel)
                ->where($where)
                ->get()
                ->row_array();
    }

    public function get_parentid($ChannelID)
    {
        return
            $this->db->select('ChannelID,ChannelParentID')
                ->from(static::channel)
                ->where(array('ChannelID' => $ChannelID))
                ->get()
                ->row_array();
    }
}