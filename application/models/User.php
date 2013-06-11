<?php


/*
*
* Autor: Jesus Mª
* Data: 5/5/2013
* This code is a copy of getting started section os Datamapper manual
* http://datamapper.wanwizard.eu/pages/gettingstarted.html
*
*/

class User extends DataMapper {

	// Database table name
    var $table = 'user';

    // Database table relations
    var $auto_populate_has_one = TRUE;
    var $auto_populate_has_many = TRUE;

    var $has_many = array(
        'project_client' => array(
            'class' => 'project',
            'other_field' => 'client'
        ),
        'project_scrum_master' => array(
            'class' => 'project',
            'other_field' => 'scrum_master'
        ),
        'project' => array(
            'class' => 'project',
            'other_field' => 'user'
        ),
        'task' => array(
            'class' => 'Task',
            'other_field' => 'user'
        ),
        'task_responsible' => array(
            'class' => 'Task',
            'other_field' => 'responsible'
        ),
        'timetasks' => array(
            'class' => 'User',
            'other_field' => 'user'
        )
    );
    
    
    // Form Validations
    var $validation = array(
        'name' => array(
            'label' => 'name',
            'rules' => array('required', 'trim', 'unique', 'alpha_dash', 'min_length' => 3, 'max_length' => 20),
        ),
        'password' => array(
            'label' => 'Password',
            'rules' => array('required', 'min_length' => 6, 'encrypt'),
        ),
        'confirm_password' => array(
            'label' => 'Confirm Password',
            'rules' => array('required', 'encrypt', 'matches' => 'password'),
        ),
        'email' => array(
            'label' => 'email',
            'rules' => array('required', 'trim', 'unique', 'valid_email')
        ),
        'confirm_email' => array(
            'label' => 'confirm email',
            'rules' => array('required', 'trim', 'matches'=> 'email')
        ),
        'rol' => array(
            'label' => 'Role',
            'rules' => array('required')
        )
    );

    function login()
    {
        // Create a temporary user object
        $u = new User();

        // Get this users stored record via their username
        $u->where('name', $this->name)->get();

        // Give this user their stored salt
        $this->salt = $u->salt;
        // Validate and get this user by their property values,
        // this will see the 'encrypt' validation run, encrypting the password with the salt
        $this->validate()->get();

        // If the username and encrypted password matched a record in the database,
        // this user object would be fully populated, complete with their ID.

        // If there was no matching record, this user would be completely cleared so their id would be empty.
        if (empty($this->id))
        {
            // Login failed, so set a custom error message
            $this->error_message('login', 'Username or password invalid');

            return FALSE;
        }
        else
        {
            // Login succeeded
            return TRUE;
        }
    }

    // Custom validate function
    // Encript

    // Validation prepping function to encrypt passwords
    // If you look at the $validation array, you will see the password field will use this function
    function _encrypt($field)
    {
        // Don't encrypt an empty string
        if (!empty($this->{$field}))
        {   
            // Generate a random salt if empty
            if (empty($this->salt))
            {
                $this->salt = md5(uniqid(rand(), true));
            }
            $this->{$field} = hash("sha512",$this->salt . $this->{$field});          
        }
    }
}


?>
