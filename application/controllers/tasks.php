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


    function add($id = -1){
        $task = new Task();
        $story = new User_story();

        $responsible = new User();
        $responsible->where('rol','member')->get();
        foreach($responsible as $r){
            $responsibles[$r->id] = $r->name;
        }

        if($id != -1){
            $story->get_by_id($id);
            if($story->name){
                $this->output->enable_profiler(TRUE);
                $this->load->view('header', array('title' => 'New task'));
                $this->load->view('tasks/add', array('task'=>$task,'User_story' => $story, 'responsibles'=> $responsibles));
                $this->load->view('footer');
            }else{
                show_error('Invalid User Story Id');
            }
        }else{
            if($this->input->post('story_id') != FALSE){
                $task->name = $this->input->post('name');
                $task->state = $this->input->post('state');               
                $task->estimate = $this->input->post('estimate'); 

                $members = new User();
                $members->where_in('id',$this->input->post('responsibles'));
                $members->get();                
                $story->get_by_id($this->input->post('story_id'));
                $responsible->get_by_id($this->input->post('responsible'));

                if($task->save(array('user_story' => $story, 'user' => $members->all, 'responsible' => $responsible))){
                        $this->session->set_flashdata('message', 'You have successfully save the '.$task->name.' task!');
                        
                        redirect('projects/backlog/'.$story->project->id);
                }else{
                    // echo $task->errors->string;
                    $this->output->enable_profiler(TRUE);
                    $this->load->view('header', array('title' => 'New task'));
                    $this->load->view('tasks/add', array('task'=>$task, 'User_story' => $story,'responsibles'=> $responsibles));
                    $this->load->view('footer');                    
                }
            }
        }
    }    

}