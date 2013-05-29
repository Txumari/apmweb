<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Project
 *
 * @author JesusM
 * @date 25-may-2013
 */
class User_story extends DataMapper {


    var $error_prefix = '<div class="alert alert-error">';
    var $error_suffix = '</div>';

    // Database table name
    var $table = 'user_stories';
    
    // Database realtions
    var $auto_populate_has_one = TRUE;
    var $auto_populate_has_many = TRUE;

    var $has_one = array(
        'project' => array(
            'class' => 'Project',
            'other_field' => 'user_stories'
        )
    );

    var $has_many = array(
        'tasks' => array(
            'class' => 'Task',
            'other_field' => 'user_story'
        )
    );

    
    // Validations rules
    var $validation = array(
        'name' => array(
            'label' => 'name',
            'rules' => array('required', 'unique', 'min_length' => 3, 'max_length' => 150)
        ),
        'description' => array(
            'labe' => 'Description',
            'rules' => array('required', 'min_length' => 10, 'max_length' => 250)
        ),
        'project' => array(
            'label' => 'Project',
            'rules' => array('required')
        ),
        'priority' => array(
            'label' => 'Priority',
            'rules' => array('required','alpha_numeric')
        ),
        'value' => array(
            'label' => 'Value',
            'rules' => array('required','alpha_numeric')
        )
    );
}

?>
