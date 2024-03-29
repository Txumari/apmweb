<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of account
 *
 * @author JesusM
 * @date 12-may-2013
 */
class account extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('login_manager');
        $this->login_manager->check_login();        
        //$this->load->helper('url');
    }

    function index() {

        $this->login_manager->logout();

        $this->output->enable_profiler(FALSE);

        redirect(login);
    }

    function add_user() {

        $u = new User();
        if ($this->input->post('name') != FALSE) {

            $u->name = $this->input->post('name');
            $u->password = $this->input->post('password');
            $u->confirm_password = $this->input->post('confirm_password');
            $u->email = $this->input->post('email');
            $u->confirm_email = $this->input->post('confirm_email');

            $u->rol = $this->input->post('role');
            if ($u->save()) {

                $message = 'You have successfully registered the user';
                //@TODO Mostrar la variable message en el header si existe
                $this->session->set_flashdata('message', $message);
                redirect('account/lists');
            }
        }

        $this->output->enable_profiler(FALSE);

        $this->load->view('header', array('title' => 'New User'));
        $this->load->view('account/add', array('user' => $u));
        $this->load->view('footer');
    }

    function edit($id = -1) {

        if($id = -1){
            $this->add_user();
        }else{
            $this->output->enable_profiler(FALSE);

            $u = new User();

            if ($this->input->post('id') == FALSE) {
                $u->get_by_id($id);

                if (!$u->name) {
                    $message_error = 'User error, try Again.';
                    //@TODO Mostrar la variable message en el header si existe
                    $this->session->set_flashdata('message_error', $message_error);
                    redirect('account/lists');
                } else {
                    $this->load->view('header', array('title' => 'Edit User'));
                    $this->load->view('account/edit', array('user' => $u));
                    $this->load->view('footer');
                }
            } else {
                $u->id = $this->input->post('id');
                $u->where('id', $u->id)->get();
                if ($this->input->post('password') != FALSE) {
                    $u->password = $this->input->post('password');
                    $u->confirm_password = $this->input->post('confirm_password');
                }
                $u->name = $this->input->post('name');
                $u->email = $this->input->post('email');
                $u->confirm_email = $this->input->post('confirm_email');
                $u->rol = $this->input->post('role');

                //$u->where('id =', $u->id)->update(array('name' => $u->name, 'email' => $u->email, 'rol' => $u->rol), FALSE);

                if ($u->save()) {
                    $message = 'You have successfully update the user';
                    $this->session->set_flashdata('message', $message);
                    redirect('account/lists');
                } else {
                    $this->load->view('header', array('title' => 'Edit User'));
                    $this->load->view('account/edit', array('user' => $u));
                    $this->load->view('footer');
                }
            }
        }
    }

    function active_user() {
        if ($id != 0) {
            $user = new User();
            $user->get_where(array('id' => $id));

            if (empty($user->id)) {
                $user->active = true;

                if ($user->save()) {

                    $this->lists();
                } else {
                    $user->error_message('active', 'Error to active user');
                }
            }
        }
    }

    function inactive_user($id = 0) {
        if ($id != 0) {
            $user = new User();
            $user->get_where(array('id' => $id));

            if (empty($user->id)) {
                $user->active = false;

                if ($user->save()) {

                    $this->lists();
                } else {
                    $user->error_message('active', 'Error to inactive user');
                }
            }
        }
    }

    function lists() {
        $user = new User();

        $user->get();
        $this->output->enable_profiler(FALSE);

        $this->load->view('header', array('title' => 'User List','menu_tabs' => TRUE));
        $this->load->view('account/list', array('users' => $user));
        $this->load->view('footer');
    }

}

?>
