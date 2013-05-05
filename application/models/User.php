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
    // var $has_many = array('table_name');

    // Form Validations
    var $validation = array(
        'name' => array(
            'label' => 'Username',
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
            'label' => 'Email Address',
            'rules' => array('required', 'trim', 'valid_email')
        )
    );


    function __construct($id = NULL)
    {
        parent::__construct($id);
    }


    // Login


    // Custom validate function
    // Encript




}


?>
