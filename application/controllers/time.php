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
            $this->output->enable_profiler(FALSE);
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
            $this->output->enable_profiler(FALSE);
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
            $time->where('user_id',$this->login_manager->get_user()->id);            
            $time->where_related('task/user_story/project', 'name', $project_name);
            $time->get();
            $this->output->enable_profiler(FALSE);
            $this->load->view('header', array('title' => 'Product Backlog'));
            $this->load->view('time/list', array('times' => $time));
            $this->load->view('footer');
        }else{
            show_error('Invalid story Id');
        }
    }

    function delete($id = -1){
       
    }

    function add($project_id = null){
        $time = new Times();
        $id_project = $project_id;
        if(!$id_project){
            if($this->input->post('project_id') != FALSE){

                $id_project = $this->input->post('project_id');
                $time->message = $this->input->post('message');
                $time->description = $this->input->post('description');               
                $time->minutes = $this->input->post('minutes'); 
                $time->date = $this->input->post('date');
                $task = new Task();
                $task->get_by_id($this->input->post('task'));
                $user = $this->login_manager->get_user();
                if($time->save(array('task' => $task,'user' => $user))) {
                        $this->session->set_flashdata('message', 'You have successfully save a new time!');
                        redirect('projects/lists');
                }
            }
        }
        $task = new Task();
        $task->where_related('user_story','project_id',$id_project)->get();
        $num_task = count($task->all);
        if($num_task > 0){
            foreach($task as $s){
                $tasks[$s->id] = $s->user_story->name. ':' . $s->name;
            }
            $this->output->enable_profiler(FALSE);            
            $this->load->view('header', array('title' => 'Time task','menu_tabs'=> FALSE));
            $this->load->view('time/add', array('project_id' => $project_id, 'time' => $time,'tasks'=> $tasks));
            $this->load->view('footer');
        }else{
            $this->session->set_flashdata('message_error', 'The project doesn'."'".'t have tasks!');
            redirect('projects/lists'); 
        }                    
    }

}