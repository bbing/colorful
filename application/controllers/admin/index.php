<?php 
/**
 * 默认控制器
 * 版权所有 色彩网络工作室 http://www.colorstudio.cn
 * @date : 2012-9-22
 * @author : bing<bbing1989@gmail.com>
 */
class Index extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		if($this->session->userdata('account_id')==false)
		{
			redirect(site_url(LOGIN_URL));
		}
		print_r($this->session->all_userdata());
	}
	
	public function login()
	{
		if ($this->input->isPost()) {
			$this->load->model('Admin_Account_Model','account',true);
			if($this->input->post('checkcode')!=$this->session->userdata('checkcode')) {
				echo json_encode(array('errorcode' => 0, 'message' => '验证码错误！'));
				return false;
			} 
			$flag = $this->account->login($this->input->post('username'),$this->input->post('password'),$this->input->ip_address());
			if ($flag) {
				$arr = array(
						'account_id'        => $flag-> account_id,
						'username'          => $flag-> username,
						'last_login_time'   => $flag-> login_time,
						'last_login_ip'     => $flag-> login_ip,
						'login_time'        => time(),
						'login_ip'          => $this->input->ip_address(),
				);
				$this->session->set_userdata($arr);
				echo json_encode(array('errorcode' => 1, 'message' => '登录成功！'));
				return false;
			} else {
				echo json_encode(array('errorcode' => 0, 'message' => '无效的用户！'));
				return false;
			}
		} else {
			$this->load->view('admin/login');
		}
	}
}