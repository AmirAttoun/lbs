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
	function check_if_openid_exists($openid_url){
		//check if there is a user account linked to google login
		$query = $this->db->get_where('User_Openids', array('openid_url' => $openid_url));
		return $query->num_rows();
		
	}

	/*
	* Created on 		7.10.2010 by Joris Morger, jorismorger@gmail.com
	* Last modified		x.xx.xxxx by xxxxxxxxxxxx, xxxxxxxxxx@xxx.xx
	*/
	function create_user_with_openid($openid, $user_info){
			$data = array(
               'username' 	=> $user_info['namePerson/first'].$user_info['namePerson/last'],
               'name' 		=> $user_info['namePerson/last'],
               'firstname' 	=> $user_info['namePerson/first'],
               'email' 		=> $user_info['contact/email'],
               'lang' 		=> $user_info['pref/language']
            );
			$this->db->insert('User', $data); 
			$user_id = $this->db->insert_id();
			unset($data);
			$data = array(
               'openid_url' 	=> $openid,
               'user_id' 		=> $user_id
            );
			$this->db->insert('User_Openids', $data); 	
	}
	
	
	/*
	* Created on 		7.10.2010 by Joris Morger, jorismorger@gmail.com
	* Last modified		x.xx.xxxx by xxxxxxxxxxxx, xxxxxxxxxx@xxx.xx
	*/
	function get_user_id_for_openid($openid_url){
		//get user id for openid and store in array so you can set cookies. 
		
	}
	
	/*
	* Created on 		7.10.2010 by Joris Morger, jorismorger@gmail.com
	* Last modified		x.xx.xxxx by xxxxxxxxxxxx, xxxxxxxxxx@xxx.xx
	*/
	function attach_openid_to_account($openid_url){
		
	}

	/*
	* Created on 		7.10.2010 by Joris Morger, jorismorger@gmail.com
	* Last modified		x.xx.xxxx by xxxxxxxxxxxx, xxxxxxxxxx@xxx.xx
	*/
	function remove_openid_from_account($openid_url){
		
	}


	
	

}

?>