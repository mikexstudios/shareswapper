<?php defined('SYSPATH') or die('No direct script access.');

class valid extends valid_Core {
	
	//The following are now used anymore since we used the old validation
	//class:

	/**
	 * Validate file link categories.
	 *
	 * @param   string   category
	 * @return  boolean
	 */
	public static function category($in_category) {
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
	public static function link_array($in_links) {
		foreach($in_links as $link)
		{
			if(valid::url($link) == false)
			{
				return false;
			}
		}
		
		return true;
	}

} // End valid
