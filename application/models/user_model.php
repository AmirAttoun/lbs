<?php
class User_model extends CI_Model{

	function User_model()
	{
		parent::CI_Model();
	}
	
	
	/*
	* Created on 		7.10.2010 by Joris Morger, jorismorger@gmail.com
	* Last modified		x.xx.xxxx by xxxxxxxxxxxx, xxxxxxxxxx@xxx.xx
	*/
	function check_if_google_login_exists(){
		//check if there is a user account linked to google login
		if(1==2){
			return true;
		}else{
			return false;
		}
	}

	/*
	* Created on 		7.10.2010 by Joris Morger, jorismorger@gmail.com
	* Last modified		x.xx.xxxx by xxxxxxxxxxxx, xxxxxxxxxx@xxx.xx
	*/
	function create_user_with_google_id($openid, $user_info){
		
	
	}

}



?>