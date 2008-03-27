<?php defined('SYSPATH') or die('No direct script access.');

class category {
	
	public static function is_valid($in_category) {
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
			case 'adult':
			case 'all': //Not a real category, but used in browse
				return true;
				break;
			default:
				return false;
		}
		
		return false;
	}
	
	public static function full_name($in_category) {
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
			case 'adult':
			case 'all': //Not a real category, but used in browse
				return ucfirst($in_category);
			case 'tv':
				return 'TV Shows';
			default:
				return false;
		}
		
		return false;
	}
	
}

?>
