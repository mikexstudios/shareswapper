<?php defined('SYSPATH') or die('No direct script access.');

class Search_Controller extends Controller {
	
	function index() {
		$home_view = new View('home');
		$home_view->render(TRUE);
	}
	
}
?>
