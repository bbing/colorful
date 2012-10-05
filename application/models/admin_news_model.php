<?php 
/**
 * 新闻
 * 版权所有 色彩网络工作室 http://www.colorstudio.cn
 * @date : 2012-10-4
 * @author : bing<bbing1989@gmail.com>
 */
class Admin_News_Model extends MY_Model
{
	public $_tableName = 'news';
	public $pk = 'id';
	public function __construct()
	{
		parent::__construct();
	}
}