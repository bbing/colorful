<?php 
/**
 * model层基类
 * 版权所有 色彩网络工作室 http://www.colorstudio.cn
 * @date : 2012-9-22
 * @author : bing<bbing1989@gmail.com>
 */
class MY_Model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function rowsCount()
	{
		return $this->db->count_all_results($this->_tableName);
	}
	
	public function select($field='*',$map='',$offset='',$limit=0,$order='')
	{
	
		$this->db->select($field);
		if (!empty($offset)) $this->db->limit($offset,$limit);
		if(!empty($order)==true)  $this->db->order_by($order);
		if ($map!='') $query = $this->db->get_where($this->_tableName, $map);
		else $query = $this->db->get( $this->_tableName );
		return $query;
	}
	
	/**
	 * 通用插入
	 * @param array $map 插入数据
	 * @return query
	 */
	public function insert($map)
	{
		$query = $this->db->insert($this->_tableName,$map);
		return $query;
	}
	
	/**
	 * 通用更新
	 * @param array $where 更新条件
	 * @param array $data   数据变动
	 * @return query
	 */
	public function update($where,$data)
	{
		$query = $this->db->where($where)->update($this->_tableName,$data);
		return $query;
	}
	
	/**
	 * 通用删除
	 * @param array $where 删除条件
	 * @return query
	 */
	public function delete($where)
	{
		$query = $this->db->delete($this->_tableName,$where);
		return $query;
	}
	
	//获得字段
	public function fields()
	{
		return  $this->db->list_fields($this->_tableName);
	}
	
	//查找单条信息
	public function find($where,$field='*',$order='')
	{
		if(!is_array($where)) $where = array($this->pk=>$where);
		$this->db->select($field);
		if(!empty($order)) $this->db->order_by($order);
		$info =  $this->db->where($where)->get($this->_tableName);
		return $info;
	}
	
	public function get()
	{
		$this->db->get($this->_tableName);
	}
}