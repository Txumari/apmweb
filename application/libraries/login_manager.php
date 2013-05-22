<?php

/**
 * Simple utility class to handle logins.
 */
class Login_Manager {
	
	var $logged_in_user = NULL;
	
	function __construct($params = array())
	{
		
		$this->CI =& get_instance(); 
		$this->session =& $this->CI->session;

		// $restric_roles = [''];
  //       if(isset($params['restric_roles']))
		// {
		// 	$restric_roles = $params['restric_roles'];
		// }   
		// $this->check_login($restric_roles);     
	}
	
        
	function check_login()
	{
		$u = $this->get_user();
		if($u === FALSE)
		{
			$this->session->set_flashdata('message', "Please Log in");
			//$message = $this->session->flashdata('message');
			redirect('login');
			// show_error("s s");
		}

	}

	function check_permision($restric_roles = ['']){
		$u = $this->get_user();
		var_dump($restric_roles);
		if(in_array($u->rol,$restric_roles))
		{
			show_error('You do not have access to this section.');
		}
	}
	
	/**
	 * process_login
	 * Validates that a username and password are correct.
	 * 
	 * @param object $user The user containing the login information.
	 * @return FALSE if invalid, TRUE or a redirect string if valid. 
	 */
	function process_login($user)
	{
		// attempt the login
		$success = $user->login();
		if($success)
		{
			// store the userid if the login was successful
			$this->session->set_userdata('logged_in_id', $user->id);
			// store the user for this request
			$this->logged_in_user = $user;
			// if a redirect is necessary, return it.
			$redirect = $this->session->userdata('login_redirect');
			if( ! empty($redirect))
			{
				$success = $redirect;
			}
		}
		return $success;
	}
	
	function logout()
	{
		$this->session->sess_destroy();
		$this->logged_in_user = NULL;
	}
	
        
        /**
         * 
         * @return boolean false if the user don´t exists, if exist return de user model
         */
	function get_user()
	{
		if(is_null($this->logged_in_user))
		{
			if( ! $this->CI->db->table_exists('user'))
			{
				return FALSE;
			}
            $this->session =& $this->CI->session;
			$id = $this->session->userdata('logged_in_id');
			if(is_numeric($id))
			{
				$u = new User();
				$u->get_by_id($id);
				if($u->exists()) {
					
					$this->logged_in_user = $u;
					return $this->logged_in_user;
				}
			}
			return FALSE;
		}
		else
		{
			return $this->logged_in_user;
		}
	}
	
}
