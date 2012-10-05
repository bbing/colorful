<?php
/**
 * 分类公用类
 * 版权所有 色彩网络工作室 http://www.colorstudio.cn
 * @date : 2012-9-30
 * @author : bing<bbing1989@gmail.com>
 */
class Cate extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function add($type, $pid)
	{
		if (!isset($type) && !isset($pid)) {
			exit;
		}
		
		$this->load->view('admin/header');
		$this->load->view('admin/cate/add', array('type'=>$type,'pid'=>$pid));
		$this->load->view('admin/common/foot');
	}
	
	public function edit($id)
	{
		if (!isset($id)) {
			exit;
		}
		$this->load->model('Admin_Menu_Model', 'menu');
		$list = $this->menu->getMenu(array('id'=>$id));
		$this->load->view('admin/header');
		$this->load->view('admin/cate/edit', $list->first_row());
		$this->load->view('admin/common/foot');
	}
}