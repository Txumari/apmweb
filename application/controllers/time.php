<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of time
 *
 * @author JesusM
 * @date 31-may-2013
 */
class time extends CI_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->library('login_manager');
        $this->login_manager->check_login();
    }

    function index(){
    	
    	$this->lists(null);
    }


    function lists($task_id = null){
        if($task_id){
            $time = new Times();
            $time->where('task_id',$task_id);
            $time->get();
            $this->output->enable_profiler(TRUE);
            $this->load->view('header', array('title' => 'Product Backlog'));
            $this->load->view('time/list', array('times' => $time));
            $this->load->view('footer');
        }else{
            show_error('Invalid story Id');
        }
    }

    function my_times($task_id = null){
        if($task_id){
            $time = new Times();
            $time->where('task_id',$task_id);
            $time->where('user_id',$this->login_manager->get_user()->id);
            $time->get();
            $this->output->enable_profiler(TRUE);
            $this->load->view('header', array('title' => 'Product Backlog'));
            $this->load->view('time/list', array('times' => $time));
            $this->load->view('footer');
        }else{
            show_error('Invalid story Id');
        }        
    }


    // function listUserTime($user_name = null, $user_story_id = null){

    // }

    function listProjectTime($project_name = null){
        if($project_name){
            $time = new Times();
            $time->where_related('task/user_story/project', 'name', $project_name);
            $time->get();
            $this->output->enable_profiler(TRUE);
            $this->load->view('header', array('title' => 'Product Backlog'));
            $this->load->view('time/list', array('times' => $time));
            $this->load->view('footer');
        }else{
            show_error('Invalid story Id');
        }
    }

    function delete($id = -1){
       
    }

}