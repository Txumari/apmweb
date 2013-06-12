<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of projects
 *
 * @author JesusM
 * @date 12-may-2013
 */
class user_stories extends CI_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->library('login_manager');
        $this->login_manager->check_login();
    }

    function index(){
    	
    	// $this->lists();
    }

    function lists($project_id = null){
        if($project_id){
            $user_story = new User_story();
            $user_story->get_by_id($project_id);
            $this->output->enable_profiler(FALSE);
            $this->load->view('header', array('title' => 'Product Backlog'));
            $this->load->view('stories/list', array('product_backlog' => $user_story, 'project_id' => $project_id ));
            $this->load->view('footer');
        }else{
            show_error('Invalid story Id');
        }
    }

    function acordion($project_id = null){
        if($project_id){
            $user_story = new User_story();
            $user_story->get_by_id($project_id);
            $this->output->enable_profiler(FALSE);
            $this->load->view('header', array('title' => 'Product Backlog'));
            $this->load->view('stories/acordion', array('product_backlog' => $user_story, 'project_id' => $project_id ));
            $this->load->view('footer');
        }else{
            show_error('Invalid story Id');
        }
    }    

    function add($id = -1){
        $story = new User_story();
        $project = new Project();

        if($id != -1){
            $project->get_by_id($id);
            if($project->name){
                $this->output->enable_profiler(FALSE);
                $this->load->view('header', array('title' => 'Edit Project'));
                $this->load->view('stories/add', array('project' => $project));
                $this->load->view('footer');
            }else{
                redirect("projects/backlog/".$id);
            }
        }else{
            if($this->input->post('id') != FALSE){
                $story->name = $this->input->post('name');
                $story->description = $this->input->post('description');               
                $story->value = $this->input->post('value');               
                $story->priority = $this->input->post('priority'); 
                $project->get_by_id($this->input->post('id'));
                if($story->save(array('project' => $project))){
                        $this->session->set_flashdata('message', 'You have successfully save the '.$story->name.' story!');
                        redirect('projects/lists');
                }else{
                    echo $story->errors->string;
                }
            }
        }
    }

    function edit($id = -1){

        $story = new User_story();
        $project = new Project();

        if($id != -1){
            $story->get_by_id($id);

            if($story->name){
                $this->output->enable_profiler(FALSE);
                $this->load->view('header', array('title' => 'Edit Project'));
                $this->load->view('stories/edit', array('story' => $story));
                $this->load->view('footer');
            }else{
                redirect('projects/lists');
            }
        }else{
            if($this->input->post('id') != FALSE){
                $story->id = $this->input->post('id');
                $story->name = $this->input->post('name');
                $story->description = $this->input->post('description');               
                $story->value = $this->input->post('value');               
                $story->priority = $this->input->post('priority'); 
                $project->get_by_id($this->input->post('id'));
                // if($story->save(array('project' => $project))){
                if($story->save()){
                        $this->session->set_flashdata('message', 'You have successfully updated the '.$story->name.' story!');
                        redirect('projects/backlog/'. $story->project->id);
                }else{
                    echo $story->errors->string;
                }
            }else{
                redirect('projects/lists');
            }
        }
    }


    function delete($id = -1){
        if($id != -1){
            $story = new User_story();
            $story->get_by_id($id);
            if( ! $story->exists())
            {
                show_error('Invalid story Id');
            }else{
                if($story->delete()){
                    $message = 'You have successfully deleted the story';
                    $this->session->set_flashdata('message', $message);
                }else{
                    $message_error = $story->error->string;
                    $this->session->set_flashdata('message', $message_error);
                }
            }
        }else{
            $message_error = 'Please select a valid story';
            $this->session->set_flashdata('message', $message_error);
        }
        redirect('projects/lists');
    }
}