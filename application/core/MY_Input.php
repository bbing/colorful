<?php 
/**
 * input类的扩展
 * 版权所有 色彩网络工作室 http://www.colorstudio.cn
 * @date : 2012-9-22
 * @author : bing<bbing1989@gmail.com>
 */
class MY_Input extends CI_Input
{
	protected $_r;
	public function __construct()
	{
		parent::__construct();
	}
	
	public function isPOST()
	{
		return strtoupper($_SERVER['REQUEST_METHOD'])=='POST';
	}
}