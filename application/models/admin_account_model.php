<?php 
/**
 * 登录验证模块
 * 版权所有 色彩网络工作室 http://www.colorstudio.cn
 * @date : 2012-9-22
 * @author : bing<bbing1989@gmail.com>
 */
class Admin_Account_Model extends MY_Model
{
	public $_tableName = 'user';
	public $pk = 'account_id';
	public function __construct()
	{
		parent::__construct();
	}
	
	public function login($user, $pass, $ip)
	{
		$map = array('username'=>$user,'password'=>md5($pass));
		$query = $this->db->where($map)->get($this->_tableName);
		if($query->num_rows()>0) {
			$row = $query->row();
			$this->db->login_time = time();
			$this->db->login_ip   = ip2long($ip);
			$logincount = $row->logincount+1;
			$data = array('login_time'=> time(),'login_ip' => ip2long($ip),'logincount' => $logincount );
			$this->db->where(array('account_id'=>$row->account_id))->update($this->_tableName, $data);
			return $row;
		} else {
			return false;
		}
	}
	
}