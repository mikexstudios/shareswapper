<?php defined('SYSPATH') or die('No direct script access.');

class Linksdata_Model extends ORM {
	//Setting table name manually
	protected $this->table = 'linksdata';
	protected $this->belongs_to = array('link');
}

?>
