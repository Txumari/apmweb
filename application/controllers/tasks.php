<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tasks
 *
 * @author JesusM
 * @date 29-may-2013
 */
class tasks extends CI_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->library('login_manager');
        $this->login_manager->check_login();
    }

    function index(){
    	
    	$this->lists(null);
    }


    function lists($user_story = null){
        if($user_story){
            $tasks = new Task();
            $tasks->get_by_id($user_story);
            $this->output->enable_profiler(TRUE);
            // $this->load->view('header', array('title' => 'Product Backlog'));
            $this->load->view('tasks/list', array('tasks' => $tasks));
            // $this->load->view('footer');
        }else{
            show_error('Invalid story Id');
        }
    }

}