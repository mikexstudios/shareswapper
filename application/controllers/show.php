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
			$view = new View('show');
			$view->render(TRUE);
		}
	}

	
}
?>
