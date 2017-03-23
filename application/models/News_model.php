<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once 'base.php';

class news_model extends Base_model
{
    const news = 'news';
    const newscon = 'news_content';

    public function __construct()
    {
        parent::__construct();
    }

    public function get_news($where, $order, $limit)
    {
        return
            $this->db->select(static::news . '.NewsID,NewsCat,NewsTitle,NewsPicUrl,news_link_to,NewsPublishTime,NewsContent')
                ->from(static::news)
                ->join(static::newscon, static::news . '.NewsID = ' . static::newscon . '.NewsID')
                ->where($where)
                ->order_by($order)
                ->limit($limit)
                ->get()
                ->result_array();
    }

    /**
     * @param $where
     * @param $order
     * @param $keyword
     * @return mixed
     * 搜索功能
     */
    public function search_news($where, $order, $keyword)
    {
        return
            $this->db->select('*')
                ->from(static::news)
                ->where($where)
                ->group_start()
                ->like('NewsTitle', $keyword)
                ->or_like('NewsAuthor', $keyword)
                ->or_like('NewsKeyword', $keyword)
                ->or_like('NewsSubTitle', $keyword)
                ->or_like('NewsDesc', $keyword)
                ->group_end()
                ->order_by($order)
                ->get()
                ->result_array();
    }

    /**
     * @param $where
     * 修改阅读数
     */
    public function update_news($where)
    {
        return
            $this->db->set('ViewTimes','ViewTimes + 1',FALSE)
                ->where($where)
                ->update(static::news);
    }

}