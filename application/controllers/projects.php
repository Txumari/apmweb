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
        $p = new Project();

        if ($this->input->post('name') != FALSE) {
            $p->name = $this->input->post('name');
            $p->description = $this->input->post('description');
            //$p->client->id = $this->input->post('client');
            // $p->scrum_master->id = $this->input->post('scrum_master');
            // echo $p->client->id;

            $client = new User();
            $client->get_by_id($this->input->post('client'));
            $scrum_master = new User();
            $scrum_master->get_by_id($this->input->post('scrum_master'));

            // $p->save_client($client);
            $p->save(
                array(
                    'client' => $client,
                    'scrum_master' => $scrum_master
                )
            );
            // $p->save_scrum_master($scrum_master);

            if ($p->save()) {
                $message = 'You have successfully save a new project';
                //@TODO Mostrar la variable message en el header si existe
                $this->session->set_flashdata('message', $message);
                redirect('projects/lists');
            }
    

        }
        //Carga de clientes y scrum_masters para mostrar en la vista
        $clients = new User();
        $clients->where('rol','client');
        $clients->get();
        foreach($clients as $client){
            $clients_array[$client->id] = $client->name;
        }
        if(isset($clients_array)){

            $dataView['clients']= $clients_array;
        }
        $scrum_masters = new User();
        $scrum_masters->where('rol','scrum master')->get();
        foreach($scrum_masters as $masters){
            $scrum_masters_array[$masters->id] = $masters->name;
        }
        if(isset($scrum_masters_array)){
            $dataView['scrum_masters']= $scrum_masters_array;
        }
        $this->output->enable_profiler(TRUE);
        $dataView['project'] = $p;

        $this->load->view('header', array('title' => 'Project List'));
        $this->load->view('project/add', array('dataView' => $dataView));
        $this->load->view('footer');

    }



}




?>
