<?php 
/**
 * 新闻系统
 * 版权所有 色彩网络工作室 http://www.colorstudio.cn
 * @date : 2012-9-30
 * @author : bing<bbing1989@gmail.com>
 */
class News extends Admin_Controller
{
	protected $defaultModel = 'Admin_News_Model';
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$this->load->model('Admin_Menu_Model', 'menu');
		$arr = array();
		$map = array('pid'=>0, 'type'=>1);
		var_dump($this->menu);
		$this->menu->db->where($map);
		$list = $this->menu->select('*',$map);
		foreach($list->result() as $item)
		{
			$arr[]=$item;
			$this->get_next_list($item->id,&$arr,'&nbsp;&nbsp;&nbsp;&nbsp;');
		}
		$res['list'] =  $arr;
		$this->load->view('admin/header');
		$this->load->view('admin/news/cate',$res);
		$this->load->view('admin/common/foot');
	}
	
	public function addnews($typeid)
	{
		$this->load->view('admin/header');
		$this->load->view('admin/news/addnews',array('typeid'=>$typeid));
		$this->load->view('admin/common/foot');
	}
	
	public function beforeadd()
	{
		$_POST['create_time']   = time();
		$_POST['edit_time']     = time();
		$_POST['account_id']    = $this->session->userdata('account_id');
		$_POST['ip']	= $this->input->ip_address();
	}
	
	public function afterAdd()
	{
// 		switch ($_POST['typeid']) {
// 			case 1 :
				redirect(site_url('/admin/news/'));
// 				break;
// 			case 2 :
// 				redirect(site_url('/admin/pic/'));
// 				break;
// 		}
	}
}