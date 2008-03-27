<?php defined('SYSPATH') or die('No direct script access.');

class Linksdata_Model extends ORM {
	//Setting table name manually
	protected $table = 'linksdata';
	protected $belongs_to = array('link');
}

?>
