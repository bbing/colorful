<?php 
/**
 * 测试
 * @author zhang
 *
 */
print_r(pathinfo("a.png"));
class Database 
{
	private $_db;
	static $_instance;
	private function __construct()
	{
		$this->_db = '';
	}
	
	private function __clone() {}
	
	public static function getInstance()
	{
		if (!(self::$_instance instanceof self)) {
			self::$_instance = new self;
		}
	}
}