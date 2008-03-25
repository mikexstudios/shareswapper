<?php

class Browse extends Controller {

	function Browse()
	{
		parent::Controller();	
	}
	
	function index()
	{
		$this->load->view('home');
	}
}
?>
