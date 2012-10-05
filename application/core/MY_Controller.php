<?php 
/**
 * 控制器基类
 * 版权所有 色彩网络工作室 http://www.colorstudio.cn
 * @date : 2012-9-22
 * @author : bing<bbing1989@gmail.com>
 */
class MY_Controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	
}

class Admin_Controller extends MY_Controller
{
	protected $defaultModel = '';    //默认模块
	
	public function __construct()
	{
		parent::__construct();
// 		if($this->session->userdata('account_id')==false)
// 		{
// 			redirect(site_url(LOGIN_URL));
// 		}
		//设置默认类
		if($this->defaultModel!='') $this->load->model($this->defaultModel,'model');
	}

	//菜单循环
	public function get_next_list($pid,&$arr,$par='')
	{
		$map ="pid = $pid ";
		$this->model->db->order_by("order DESC");
		$list = $this->model->select('*',$map)->result();
		if(!is_array($list)) return false;
		$par .= "&nbsp;&nbsp;&nbsp;&nbsp;";
		foreach($list as &$item)
		{
			$item->title=$par.'|-'.$item->title;
			$arr[]=$item;
			$this->get_next_list($item->id,&$arr,$par);
		}
		return true;
	}
	
	public function _remap($method)
	{
		if (!method_exists($this, $method)) {
			show_404("{$this}/{$method}");
		}
		$beforeMethod = "before$method";
		$afterMethod = "after$method";
		if (method_exists($this,$beforeMethod)) {
			$this->$beforeMethod();
		}
		call_user_func_array(array($this, $method), array_slice($this->uri->rsegments, 2));
		if (method_exists($this,$afterMethod)) {
			$this->$afterMethod();
		}
	}
	
	/**
	 * 
	 * @param unknown_type $pid
	 */
	public function add($pid="0")
	{
		$ret['pid'] = $pid;
		if( $this->input->isPOST() ) {
			print_r($_POST);
			$data = $this->check_field($_POST);
			print_r($data);exit;
			$map = $data;
			if(isset($map['create_time'])) {
				unset($map['create_time']);
			}
			if(isset($map['edit_time'])) {
				unset($map['edit_time']);
			}
			$id = $this->db->where($map)->get($this->model->_tableName)->num_rows();
			if ($id>0) {
				$ret['reply'] = array('errorcode' => 0, 'messgae' => '记录已存在');
			} else {
				$this->model->insert($data);
				$ret['reply'] = array('errorcode' => 1, 'messgae' => '操作成功');
			}
			$this->checkPOST($ret);
		} else {
// 			$this->_view($this->tpl['add'], $ret);
		}
	}
	
	public function edit($id = '')
	{
		if( $this->input->isPOST() )
		{
	
			$data = $this->check_field($_POST);
			$this->model->update(array($this->model->pk=>$_POST['id']),$data);
// 			$ret['repayment']['s']="操作成功！";
// 			$this->checkPOST($ret);
		}
		else
		{
// 			$ret['info'] = $this->model->find($id)->row();
// 			$this->_view($this->tpl['edit'],$ret);
		}
	}
	
	/**
	 * 通用删除
	 * @param array $where 删除条件
	 * @return query
	 */
	public function delete($id)
	{
		$query = $this->db->delete($this->model->_tableName,array('id'=>$id));
		return $query;
	}
	
	
	/**
	 * 检查字段是否可用
	 * @param $data
	 **/
	protected function check_field($post)
	{
		$data=array();
		$fields = $this->model->fields();
		foreach($post as $k=>$v) {
			if (in_array($k,$fields)) {
				$data[$k]=$v;
			}
		}
		return $data;
	}
	/**
	 * 判断返回数据
	 * @param unknown_type $ret
	 */
	
	protected function checkPOST($ret)
	{
		 
		if($this->input->is_ajax_request()) {
			echo json_encode($ret['reply']);
		} else {
			//$this->view(array('postpage',true),$ret);
		}
	}
}