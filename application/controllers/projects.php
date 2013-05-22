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
        
        $this->load->library('login_manager');
        // $restrics[] = 'member';
        $this->login_manager->check_login();
        // $this->login_manager->check_permision($restrics);
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

    // function add(){
    //     $p = new Project();

    //     if ($this->input->post('name') != FALSE) {
    //         $p->name = $this->input->post('name');
    //         $p->description = $this->input->post('description');
    //         $client = new User();
    //         $client->get_by_id($this->input->post('client'));
    //         $scrum_master = new User();
    //         $scrum_master->get_by_id($this->input->post('scrum_master'));
    //         $p->save(
    //             array(
    //                 'client' => $client,
    //                 'scrum_master' => $scrum_master
    //             )
    //         );
    //         if ($p->save()) {
    //             $message = 'You have successfully save a new project';
    //             //@TODO Mostrar la variable message en el header si existe
    //             $this->session->set_flashdata('message', $message);
    //             redirect('projects/lists');
    //         }
    

    //     }else{
    //         $clients = new User();
    //         $clients->where('rol','client');
    //         $clients->get();
    //         foreach($clients as $client){
    //             $clients_array[$client->id] = $client->name;
    //         }
    //         if(isset($clients_array)){

    //             $dataView['clients']= $clients_array;
    //         }
    //         $scrum_masters = new User();
    //         $scrum_masters->where('rol','scrum master')->get();
    //         foreach($scrum_masters as $masters){
    //             $scrum_masters_array[$masters->id] = $masters->name;
    //         }
    //         if(isset($scrum_masters_array)){
    //             $dataView['scrum_masters']= $scrum_masters_array;
    //         }
    //         $this->output->enable_profiler(TRUE);
    //         $dataView['project'] = $p;

    //         $this->load->view('header', array('title' => 'Project List'));
    //         $this->load->view('project/add', array('dataView' => $dataView));
    //         $this->load->view('footer');
    //     }

    // }

    function edit($id = -1){

        $p = new Project();

        $isNew = FALSE;

        if($this->input->post('id') == FALSE && $this->input->post('name') == TRUE){
            $isNew = TRUE;
        }

        if($this->input->post('id') != FALSE || $isNew){
            //Intento actualizar el registro
            $p->id = $this->input->post('id');
            $p->name = $this->input->post('name');
            $p->description = $this->input->post('description');
            $client = new User();
            $client->get_by_id($this->input->post('client'));
            $scrum_master = new User();
            $scrum_master->get_by_id($this->input->post('scrum_master'));

            $membersDelete = new User();
            $membersDelete->where_not_in('id',$this->input->post('members'));
            $membersDelete->get();
            $p->delete(
                        array(
                                'user' => $membersDelete->all
                        )
                    );

            $members = new User();
            $members->where_in('id',$this->input->post('members'));
            $members->get();
            if($p->save(
                            array(
                                'client' => $client,
                                'scrum_master' => $scrum_master,
                                'user' => $members->all
                            )
                        )
                ){
                    if(isNew){
                        $message = 'You have successfully created the '.$p->name.' project!';
                    }else{
                        $message = 'You have successfully updated the '.$p->name.' project!';
                    }
                    $this->session->set_flashdata('message', $message);
                    redirect('projects/lists');
            }else{
                echo $p->errors->string;
            }
        }else{
            $dataView = NULL;
            if($id != -1){
                $p->get_by_id($id);
                if(!$p->name){
                    $message_error = 'Project error, try Again.';
                    $this->session->set_flashdata('message_error', $message_error);
                    redirect('project/lists');
                }else{               
                    $dataView['project'] = $p; 

                    foreach ($p->user as $member) {
                        $members_relation[] = $member->id;
                    }
                    if(isset($members_relation)){
                        $dataView['members_relation']= $members_relation;
                    }
                }
            }
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
            $members = new User();
            $members->where('rol','member')->get();
            foreach($members as $member){
                $members_array[$member->id] = $member->name;
            }
            if(isset($members_array)){
                $dataView['members']= $members_array;
            } 
            $this->output->enable_profiler(TRUE);
            $this->load->view('header', array('title' => 'Edit Project'));
            $this->load->view('project/edit', array('dataView' => $dataView));
            $this->load->view('footer');
        }

    }



    function delete($id = -1){

        if($id != -1){
            $project = new Project();
            $project->get_by_id($id);
            if( ! $project->exists())
            {
                show_error('Invalid Project Id');
            }else{
                if($project->delete()){
                    $message = 'You have successfully deleted the project';
                    $this->session->set_flashdata('message', $message);

                }else{
                    $message_error = $project->error->string;
                    $this->session->set_flashdata('message', $message_error);
                }
            }

        }else{
            $message_error = 'Please select a valid project';
            $this->session->set_flashdata('message', $message_error);
        }
        redirect('projects/lists');



    }

}




?>
