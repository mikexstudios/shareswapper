<?php defined('SYSPATH') or die('No direct script access.');

class Recent_Controller extends Controller {

	function index() {
			//We have a valid category:
			$link = new Link_Model;
			
			$view = new View('recent');
			$view->category_records = $link->get_most_recent(50);

			$view->render(TRUE);
		
	}
}
?>
