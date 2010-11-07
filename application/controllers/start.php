<?php
class Start extends Controller {
 
	function index()
	{
 		$this->output->enable_profiler(TRUE);
 		
		$this->lang->load('start'); 
		
		$this->load->view('start/welcome_view');
	}
		
}
 
?>