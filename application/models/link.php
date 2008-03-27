<?php defined('SYSPATH') or die('No direct script access.');

class Link_Model extends ORM {
	//Setting table name manually
	//protected $this->table = 'links';
	protected $has_many = array('linksdata');
	
	public function get_most_recent($in_limit='') {
		self::$db->select(); //*
		self::$db->from('links');
		self::$db->orderby('updated_time', 'DESC');
		if(!empty($in_limit))
		{
			self::$db->limit($in_limit);
		}
		
		return self::$db->get();
	}
}

?>
