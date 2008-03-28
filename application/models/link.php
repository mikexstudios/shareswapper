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
	
	public function search_title_and_description($in_keywords) {
		$result = self::$db->query("
			SELECT *, MATCH(`title`, `description`) AGAINST(".self::$db->escape($in_keywords).") AS score
			FROM `links`
			WHERE MATCH(`title`, `description`)
			AGAINST(".self::$db->escape($in_keywords).")
			");
		
		//If we don't have results, then we do a REGEX search.
		//NOTE: REGEX search is VERY slow!
		//This overcomes some FULLTEXT limitations.
		if($result->count() <= 0)
		{
			//Generate regex for keywords
			$in_keyword_array = explode(' ', $in_keywords); //Split by space
			$keyword_regex = implode('|', $in_keyword_array); //Glue by | (OR)
			
			self::$db->select(); //*
			self::$db->from('links');
			self::$db->regex('title', $keyword_regex);
			self::$db->orregex('description', $keyword_regex);
			return self::$db->get();
		}
		
		return $result;
	}
}

?>
