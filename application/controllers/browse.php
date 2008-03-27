<?php defined('SYSPATH') or die('No direct script access.');

class Browse_Controller extends Controller {

	/**
	 * We use this to have everything to the index method.
	 */	 	
	function _remap($method) {
		if($method === 'index')
		{
			$this->index();
		}
		else
		{
			$this->index($method);
		}
	}

	function index($in_category='') {
		if(empty($in_category) || strlen($in_category) > 20 || !category::is_valid($in_category))
		{
			//Show category selection page
			$view = new View('browse-showcategories');
			$view->render(TRUE);
		}
		else
		{
			//We have a valid category:
			$link = new Link_Model;
			//TODO: Make this limit to certain number of records. Also page this.
			if($in_category == 'all')
			{
				$category_records = $link->find_all();
			}
			else
			{
				$category_records = $link->find_all_by_category($in_category);
			}
			//print_r($category_records);die();
			
			$view = new View('browse');
			$view->category_name = category::full_name($in_category);
			if(!empty($category_records))
			{
				$view->number_records = $category_records->count();
				$view->category_records = $category_records;
			}
			else
			{
				//The category is empty!
				$view->number_records = 0;
				$view->category_records = array();
			}
			$view->render(TRUE);
		}
	}
}
?>
