<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Times
 *
 * @author JesusM
 * @date 31-may-2013
 */
class Times extends DataMapper {

    // Database table name
    var $table = 'time';
    
    // Database realtions
    var $auto_populate_has_one = TRUE;
    var $auto_populate_has_many = TRUE;

    var $has_one = array(
        'user' => array(
            'class' => 'User',
            'other_field' => 'timetasks'
        ),
        'task' => array(
            'class' => 'Task',
            'other_field' => 'timetask'
        )
    );
    
    // Validations rules
    var $validation = array(
        'name' => array(
            'label' => 'name',
            'rules' => array('required', 'trim', 'unique', 'alpha_dash', 'min_length' => 3, 'max_length' => 20)
        ),
        'message' => array(
            'label' => 'Message',
            'rules' => array('required', 'min_length' => 3, 'max_length' => 250)
        ),
        'description' => array(
            'label' => 'Description',
            'rules' => array('required', 'min_length' => 3, 'max_length' => 1000)
        ),
        'minutes' => array(
            'label' => 'Time',
            'rules' => array('required')
        ),
        'user_story' => array(
            'label' => 'User story',
            'rules' => array('required')
        ),
        'user' => array(
            'label' => 'User',
            'rules' => array('required')
        ),
        'date' => array(
            'label' => 'Date',
            'rules' => array('required')
        )
    );
}

?>
