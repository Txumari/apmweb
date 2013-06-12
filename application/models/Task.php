<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Task
 *
 * @author JesusM
 * @date 29-may-2013
 */
class Task extends DataMapper {

    // Database table name
    var $table = 'Task';
    
    // Database realtions
    var $auto_populate_has_one = TRUE;
    var $auto_populate_has_many = TRUE;

    var $has_one = array(
        'responsible' => array(
            'class' => 'User',
            'other_field' => 'task_responsible'
        ),
        'user_story' => array(
            'class' => 'User_story',
            'other_field' => 'tasks'
        )
    );

    var $has_many = array(
        'user' => array(
            'class' => 'user',
            'other_field' => 'task'
        ),
        'timetask' => array(
            'class' => 'Times',
            'other_field' => 'task'
        )
    );
    
    // Validations rules
    var $validation = array(
        'name' => array(
            'label' => 'name',
            'rules' => array('required', 'trim', 'unique', 'min_length' => 3, 'max_length' => 250)
        ),
        'responsible' => array(
            'label' => 'Responsible',
            'rules' => array('required')
        ),
        'state' => array(
            'label' => 'State',
            'rules' => array('required')
        ),
        'estimate' => array(
            'label' => 'Estimate',
            'rules' => array('required')
        ),
        'user_story' => array(
            'label' => 'User story',
            'rules' => array('required')
        ),
        'user' => array(
            'label' => 'Members',
            'rules' => array('required')
        ) 
    );
}

?>
