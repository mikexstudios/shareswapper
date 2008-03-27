<?php defined('SYSPATH') or die('No direct script access.');

class Add_Controller extends Controller {
	
	function index() {
		$home_view = new View('add');
		$home_view->form_category = ''; //Set to something to avoid error
		$home_view->form_links = array();
		$home_view->render(TRUE);
	}
	
	function submit() {
		$in_data = new Validation($_POST);
		$in_data->set_rules(array(
			//Format:
			//key       friendly name, validation rules
			//= before trim means use PHP function
			'category' => array('Category', '=trim|required[1,100]|callback_valid_category'),
			'title' => array('Title', '=trim|required[1,255]'),
			'description' => array('Description', '=trim|required[1,20000]'),
			'link' => array('Link(s)', '=trim|required[1,400]|valid_url') //Arrays are automatically broken up into elements and validated.
		));
		
		if($in_data->run())
		{
			//Validation was a success. Now let's do stuff!
			
			$link = new Link_Model;
			$link->category = $in_data->category;
			$link->title = $in_data->title;
			$link->description = $in_data->description;
			$link->updated_time = time();
			$link->save();
			
			//Also save links to the linksdata table:
			$linksdata = new Linksdata_Model;
			foreach($in_data->link as $each_link)
			{
				$linksdata->clear(); //Need this so that our model resets after each save.
				$linksdata->link_id = $link->id;
				$linksdata->key = 'link';
				$linksdata->value = $each_link;
				$linksdata->save();
			} 
			
			//Show success page
			$success_view = new View('add-success');
			$success_view->file_link_url = url::site('show/'.url::int_to_short_id($link->id));
			$success_view->render(true);
			
		}
		else
		{
			//Validation failed!
			$home_view = new View('add');
			$home_view->error = $in_data->error_string;
			$home_view->form_category = $in_data->category;
			$home_view->form_title = $in_data->title;
			$home_view->form_description = $in_data->description;
			$home_view->form_links = $in_data->link; //Array
			$home_view->render(true);
		}
	}
	
	/**
	 * Validate file link categories.
	 *
	 * @param   string   category
	 * @return  boolean
	 */
	public function valid_category($in_category) {
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
	
}
?>
