<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Project
 *
 * @author JesusM
 * @date 17-may-2013
 */
class Project extends DataMapper {

    // Database table name
    var $table = 'project';
    
    // Database realtions
    var $auto_populate_has_one = TRUE;
    var $auto_populate_has_many = TRUE;

    var $has_one = array(
        'client' => array(
            'class' => 'user',
            'other_field' => 'project_client'
        ),
        'scrum_master' => array(
            'class' => 'user',
            'other_field' => 'project_scrum_master'
        )
    );

    var $has_many = array(
        'user' => array(
            'class' => 'user',
            'other_field' => 'project'
        ),
        'user_stories' => array(
            'class' => 'User_story',
            'other_field' => 'project'
        )
    );
    
    // Validations rules
    var $validation = array(
        'name' => array(
            'label' => 'name',
            'rules' => array('required', 'trim', 'unique', 'alpha_dash', 'min_length' => 3, 'max_length' => 20)
        ),
        'client' => array(
            'label' => 'client',
            'rules' => array('required')
        ),
        'scrum_master' => array(
            'label' => 'Scrum Master',
            'rules' => array('required')
        )
    );
    
    
    
    // 
    
    

}

?>
