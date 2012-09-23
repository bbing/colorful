<?php 
/**
 * 验证码
 * 版权所有 色彩网络工作室 http://www.colorstudio.cn
 * @date : 2012-9-23
 * @author : bing<bbing1989@gmail.com>
 */
class Vcode extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$this->load->model('ConfirmCode_Model','code');
		$this->code->fontUrl = APPPATH.'/fonts/';
		$this->session->set_userdata('checkcode',$this->code->make());
		$this->code->show();
	}
	
}