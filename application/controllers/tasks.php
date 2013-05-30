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

    function delete($id = -1){
        if($id != -1){
            $task = new Task();
            $task->get_by_id($id);
            if( ! $task->exists())
            {
                show_error('Invalid task Id');
            }else{
                $id_project = $task->story_user->project->id;
                if($task->delete()){
                    $message = 'You have successfully deleted the task';
                    $this->session->set_flashdata('message', $message);
                }else{
                    $message_error = $task->error->string;
                    $this->session->set_flashdata('message', $message_error);
                }
            }
        }else{
            $message_error = 'Please select a valid task';
            $this->session->set_flashdata('message', $message_error);
        }
        redirect('projects/backlog/'.$id_project);
    }    

}