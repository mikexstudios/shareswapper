<?php defined('SYSPATH') or die('No direct script access.');

class Add_Controller extends Controller {
	
	function index() {
		$home_view = new View('add');
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
			'link' => array('Link(s)', 'required[1,400]|valid_url') //Arrays are automatically broken up into elements and validated.
		));
		
		if($in_data->run())
		{
			echo 'Validated!';
		}
		else
		{
			echo 'Failed!';
			echo $in_data->error_string;
		}
		
		/*
		$in_data->add_rules('category', 'required', 'length[1,100]', 'category');
		$in_data->add_rules('title', 'required', 'length[1,255]');
		$in_data->add_rules('description', 'required', 'length[1,10000]');
		$in_data->add_rules('link', 'required', 'link_array');
		
		if($in_data->validate())
		{
			echo 'Validated!';
		}
		else
		{
			echo 'Failed!';
			print_r($in_data->errors());
			$in_data->message('2', 'Field s is required');
			echo $in_data->message();
		}
		*/
		
		//var_dump($_POST);
		//print_r($_POST['link']);
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
