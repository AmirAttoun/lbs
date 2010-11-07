<?php
class Login extends Controller {
 
 	/*
	* Created on 		7.10.2010 by Joris Morger, jorismorger@gmail.com
	* Last modified		x.xx.xxxx by xxxxxxxxxxxx, xxxxxxxxxx@xxx.xx
	*/
	function __construct() {
		parent::Controller();
		#enable query strings for this class
		parse_str($_SERVER['QUERY_STRING'],$_GET);
		//$this->output->enable_profiler(TRUE);
		$this->load->model('user_model', 'user');

	}
	
	/*
	* Created on 		7.10.2010 by Joris Morger, jorismorger@gmail.com
	* Last modified		x.xx.xxxx by xxxxxxxxxxxx, xxxxxxxxxx@xxx.xx
	*/
	function login_openid($identity){
		$this->output->enable_profiler(TRUE);
		$this->load->library('openid');
		try {
			if(!isset($_GET['openid_mode'])) {
				$openid = new Openid;
				$openid->identity = 'https://www.google.com/accounts/o8/id';
        		$openid->required = array('namePerson/first', 'namePerson/last', 'contact/email', 'pref/language');
				header('Location: ' . $openid->authUrl());
			}
			elseif($_GET['openid_mode'] == 'cancel')
				echo 'User has canceled authentication!';
			else {
				$openid = new Openid;
				if($openid->validate()){
					$user_info = $openid->getAttributes();	
					if($this->user->check_if_openid_exists($openid->__get('identity')) > 0){
						//set cookies and such
						//$this->user->login_google();
						$this->load->view('login/login_success_view');
					}
					else{
						//if the google id is not yet linked with an account, do that here. 
						$this->user->create_user_with_openid($openid->__get('identity'), $user_info);
						$this->load->view('link more info to openid here');
					}
				}
				else {
					$this->load->view('login/login_fail_view');
				}
			}
		}
		catch(ErrorException $e) {
			echo $e->getMessage();
		}
	}
	
}

?>