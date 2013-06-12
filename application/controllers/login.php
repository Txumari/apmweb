<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Users
 *
 * @author JesusM
 * @date 07-may-2013
 */
class Login extends CI_Controller {

    function __construct()
	{
		parent::__construct();
		
        $this->load->library('login_manager');
	}

//    function index()
//    {
//        // Let's create a user for my testing
//        $u = new User();
//        $u->name = 'FredSmith3';
//        $u->password = 'apples';
//        $u->confirm_password = 'apples';
//        $u->salt = '9d6492588e23214c216e36fed2648437';
//        $u->email = 'fred@smith3.com';
//
//        // And save them to the database (validation rules will run)
//        
//        if ($u->save())
//        {
//            // User object now has an ID
//            echo 'ID: ' . $u->id . '<br />';
//            echo 'Username: ' . $u->name . '<br />';
//            echo 'Email: ' . $u->email . '<br />';
//
//            // Not that we'd normally show the password, but when we do, you'll see it has been automatically encrypted
//            // since the User model is setup with an encrypt rule in the $validation array for the password field
//            echo 'Password: ' . $u->password . '<br />';
//        }
//        else
//        {
//            // If validation fails, we can show the error for each property
//            echo $u->error->name;
//            echo $u->error->password;
//            echo $u->error->email;
//
//            // or we can loop through the error's all list
//            foreach ($u->error->all as $error)
//            {
//                echo $error;
//            }
//
//            // or we can just show all errors in one string!
//            echo $u->error->string;
//
//            // Each individual error is automatically wrapped with an error_prefix and error_suffix, which you can change (default: <p>error message</p>)
//        }
//
//    }

    
    
    function index()
    {
        //$this->load->helper('url');
        $user = $this->login_manager->get_user();
        if($user !== FALSE)
        {
            // already logged in, redirect to welcome page
            redirect('welcome');
        }
        // Create a user to store the login validation
        $user = new User();
        if($this->input->post('name') !== FALSE)
        {
            // A login was attempted, load the user data
            //$user->from_array($_POST, array('name', 'password'));
            
            $user->name = $this->input->post('name');
            $user->password = $this->input->post('password');
            // get the result of the login request
            
            $login_redirect = $this->login_manager->process_login($user);
            
            if($login_redirect)
            {
                echo "hola";
                if($login_redirect === TRUE)
                {
                    // if the result was simply TRUE, redirect to the welcome page.
                    redirect('projects/lists');
                }
                else
                {
                    // otherwise, redirect to the stored page that was last accessed.
                    redirect($login_redirect);
                }
            }
        }
        
        $this->output->enable_profiler(FALSE);
        
        $this->load->view('header', array('title' => 'Login','hide_menu'=>'true'));
        $this->load->view('login', array('user' => $user));
        $this->load->view('footer');
    }
    
    
    function register()
    {
        // Create user object
        $u = new User();

        // Put user supplied data into user object
        // (no need to validate the post variables in the controller,
        // if you've set your DataMapper models up with validation rules)
        $u->username = $this->input->post('username');
        $u->password = $this->input->post('password');
        $u->confirm_password = $this->input->post('confirm_password');
        $u->email = $this->input->post('email');

        // Attempt to save the user into the database
        if ($u->save())
        {
            echo '<p>You have successfully registered</p>';
        }
        else
        {
            // Show all error messages
            echo '<p>' . $u->error->string . '</p>';
        }
    }

}

/* End of file users.php */
/* Location: ./application/controllers/users.php */
