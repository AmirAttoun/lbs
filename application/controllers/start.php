<?php
class Start extends Controller {
 
	function index()
	{
		// you might want to just autoload these two helpers
		$this->load->helper('language');
		$this->load->helper('url');
 		$this->output->enable_profiler(TRUE);
		// load language file
		$this->lang->load('start'); 
		$this->load->view('start/welcome_view');
	}
	
	
	
	
	
	
}
 
?>