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
class projects extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }

    function index(){
    	
    	$this->lists();
    }


    function lists($user = null){

        $project = new Project();
        if(!$user){
        	$project->get();
    	}else{
    		$project->where('id',$user->id)->get();
    	}
        $this->output->enable_profiler(TRUE);

        $this->load->view('header', array('title' => 'Project List'));
        $this->load->view('project/list', array('projects' => $project));
        $this->load->view('footer');
    }

    function add(){


        if ($this->input->post('name') != FALSE) {


        }

        $this->output->enable_profiler(TRUE);

        $this->load->view('header', array('title' => 'Project List'));
        $this->load->view('project/add', array('project' => $project));
        $this->load->view('footer');

    }



}




?>
