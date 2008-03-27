<?php defined('SYSPATH') or die('No direct script access.');

class Link_Model extends ORM {
	//Setting table name manually
	//protected $this->table = 'links';
	protected $has_many = array('linksdata');
}

?>
