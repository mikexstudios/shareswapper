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
			//Secure inputs
			$in_data->category = strip_tags($in_data->category);
			$in_data->category = htmlentities($in_data->category, ENT_QUOTES, 'UTF-8');
			$in_data->title = strip_tags($in_data->title);
			$in_data->title = htmlentities($in_data->title, ENT_QUOTES, 'UTF-8');
			
			//Validation was a success. Now let's do stuff!
			$link = new Link_Model;
			$link->category = $in_data->category;
			$link->title = $in_data->title;
			$link->description = bbcode::parse($in_data->description); //Input escaped in bbcode::parse
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
			if(is_array($in_data->link))
			{
				$home_view->form_links = $in_data->link; //Array
			}
			else
			{
				$home_view->form_links = array(); //Array
			}
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
		return category::is_valid($in_category);
	}
	
}
?>
