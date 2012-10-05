<?php 
/**
 * 分类 
 * 版权所有 色彩网络工作室 http://www.colorstudio.cn
 * @date : 2012-9-30
 * @author : bing<bbing1989@gmail.com>
 */
class Menu extends Admin_Controller
{
	protected $defaultModel ='Admin_Menu_Model';
	public function __construct()
	{
		parent::__construct();
	}
	
	public function beforeAdd()
	{
		$_POST['create_time']   = time();
		$_POST['edit_time']     = time();
		$_POST['account_id']    = $this->session->userdata('account_id');
	}
	public function afterAdd()
	{
		switch ($_POST['type']) {
			case 1 :
				redirect(site_url('/admin/news/'));
				break;
			case 2 :
				redirect(site_url('/admin/pic/'));
				break;
		}
	}
	
	//修改前置
	public function beforeEdit()
	{
		$_POST['edit_time'] = time();
		$_POST['account_id']=$this->session->userdata('account_id');
	}
	public function afterEdit()
	{
		switch ($_POST['type']) {
			case 1 :
				redirect(site_url('/admin/news/'));
				break;
			case 2 :
				redirect(site_url('/admin/pic/'));
				break;
		}
	} 
}