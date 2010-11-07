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
		$this->output->enable_profiler(TRUE);
		$this->load->model('user_model', 'user');

	}
	
	/*
	* Created on 		7.10.2010 by Joris Morger, jorismorger@gmail.com
	* Last modified		x.xx.xxxx by xxxxxxxxxxxx, xxxxxxxxxx@xxx.xx
	*/
	function google_openid(){
		$this->load->library('openid');
		try {
			if(!isset($_GET['openid_mode'])) {
				$openid = new Openid;
				$openid->identity = 'https://www.google.com/accounts/o8/id';
				header('Location: ' . $openid->authUrl());
			}
			elseif($_GET['openid_mode'] == 'cancel')
				echo 'User has canceled authentication!';
			else {
				$openid = new Openid;
				if($openid->validate()){
					$google_open_id = $openid->__get('identity');
					if($this->user->check_google_login_exists){
						//set cookies and such
						//$this->user->login_google();
						$this->load->view('login/login_success_view');
					}
					//if the google id is not yet linked with an account, do that here. 
					else{
						$user_info = '';
						$this->user->create_user_with_google_id($google_open_id, $user_info);
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