<?php 
/**
 * 用户管理控制器
 * 版权所有 色彩网络工作室 http://www.colorstudio.cn
 * @date : 2012-9-23
 * @author : bing<bbing1989@gmail.com>
 */
class Account extends Admin_Controller
{
	protected $defaultModel ='Admin_Account_Model'; 
	
	public function beforeAdd()
	{
		$_POST['password'] = md5($_POST['password']);
	}
	
	
	public function __construct()
	{
		parent::__construct();
	}
	
	
}