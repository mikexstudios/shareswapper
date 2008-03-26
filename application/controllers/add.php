<?php defined('SYSPATH') or die('No direct script access.');

class Add_Controller extends Controller {
	
	function index() {
		$home_view = new View('add');
		$home_view->render(TRUE);
	}
	
	function submit() {
	
	}
}
?>
