<?php 
/**
 * 系统菜单获取
 * 版权所有 色彩网络工作室 http://www.colorstudio.cn
 * @date : 2012-9-29
 * @author : bing<bbing1989@gmail.com>
 */
class Admin_Menu_Model extends MY_Model
{
	public $_tableName='admin_menu';
	public $pk= 'id';
	public function __construct()
	{
		parent::__construct();
	}

	public function getMenu($where){
		return $this->db->select('id,pid,title,url,order,is_del,type')->where($where)->order_by('order desc,id DESC')->get($this->_tableName);
	}
	
	
}