<?php 
/**
 * 默认页面
 * 版权所有 色彩网络工作室 http://www.colorstudio.cn
 * @date : 2012-9-30
 * @author : bing<bbing1989@gmail.com>
 */
class Welcome extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/welcome');
		$this->load->view('admin/common/foot');
	}
}