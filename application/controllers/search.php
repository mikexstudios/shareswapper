<?php defined('SYSPATH') or die('No direct script access.');

class Search_Controller extends Controller {
	
	function index() {
		//Check if we have a search
		$keywords = $this->input->get('keywords');
		
		if(!empty($keywords))
		{
			//Do some input checking on keywords
			$link_model = new Link_Model;
			$search_results = $link_model->search_title_and_description($keywords);
			
			$view = new View('search');
			$view->page_header = new View('page-header');
			$view->page_header->search_keywords = $keywords;
			$view->search_keywords = $keywords;
			$view->number_records = $search_results->count();
			$view->search_results = $search_results;
			$view->render(TRUE);
		}
		else
		{
			$home_view = new View('home');
			$home_view->render(TRUE);	
		}
	
	}
	
}
?>
