<?php defined('SYSPATH') or die('No direct script access.');

class Show_Controller extends Controller {
	
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

	function index($in_id='') {
		if(empty($in_id) || !valid::alpha_numeric($in_id) || strlen($in_id) > 10)
		{
			//Redirect to browse
			url::redirect('home'); 
		}
		else
		{
			//Decode the id
			$in_id = url::short_id_to_int($in_id);
			//Now get info from DB:
			$link = new Link_Model;
			$link->find($in_id);

			//Check for success
			$temp = $link->title; //Need to do this for empty
			if(empty($temp))
			{
				//We failed, redirect to home.
				url::redirect('home');
			}
			else
			{
				//Get links too:
				$linksdata = new Linksdata_Model;
				$links_arr = $linksdata->find_all_by_link_id_and_key($link->id, 'link');
			
				$view = new View('show');
				$view->file_title = $link->title;
				$view->file_category = category::full_name($link->category);
				$view->file_description = $link->description;
				$view->file_last_updated = date('dS F Y g:i A', $link->updated_time);
				$view->file_links = $links_arr;
				
				$view->render(TRUE);
			}
		}
	}

	
}
?>
