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

 function lists(){

        $user_story = new User_story();
        $user_story->get();
        $this->output->enable_profiler(TRUE);
        $this->load->view('header', array('title' => 'Product Backlog'));
        $this->load->view('stories/list', array('product_backlog' => $user_story));
        $this->load->view('footer');
    }

}