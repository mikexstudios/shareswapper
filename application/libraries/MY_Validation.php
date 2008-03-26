<?php defined('SYSPATH') or die('No direct script access.');
 
class Validation extends Validation_Core {
 
	public function __construct()
	{
		// don't for get to call the parent constructor!
		parent::__construct();
	}

	/**
	 * Validate file link categories.
	 *
	 * @param   string   category
	 * @return  boolean
	 */
	public function category($in_category) {
		switch($in_category)
		{
			case 'other':
			case 'anime':
			case 'books':
			case 'games':
			case 'movies':
			case 'music':
			case 'pictures':
			case 'software':
			case 'tv':
				return true;
				break;
			default:
				return false;
		}
		
		return false;
	}

	/**
	 * Validate file links.
	 *
	 * @param   string   category
	 * @return  boolean
	 */
	public function link_array($in_links) {
		foreach($in_links as $link)
		{
			if(valid::url($link) == false)
			{
				return false;
			}
		}
		
		return true;
	}

}
 
?>
