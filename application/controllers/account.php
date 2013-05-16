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
        $this->load->helper('url');
    }

    function index() {
        $this->load->helper('url');

        $this->login_manager->logout();

        $this->output->enable_profiler(TRUE);

        redirect(login);
    }

    function add_user() {

        $u = new User();
//        $u = new User();
//        $u->name = 'FredSmith3';
//        $u->password = 'apples';
//        $u->confirm_password = 'apples';
//        $u->salt = '9d6492588e23214c216e36fed2648437';
//        $u->email = 'fred@smith3.com';

        if ($this->input->post('name') != FALSE) {
           
            $u->name = $this->input->post('name');
            $u->password = $this->input->post('password');
            $u->confirm_password = $this->input->post('confirm_password');
            $u->email = $this->input->post('email');
            $u->rol = $this->input->post('role');
            if ($u->save()) {
        
                $message = 'You have successfully registered the user';
                //@TODO Mostrar la variable message en el header si existe
                $this->session->set_flashdata('message', $message);
                redirect('account/user_list');
            }
        }

        $this->output->enable_profiler(TRUE);

        $this->load->view('header', array('title' => 'Login'));
        $this->load->view('account/add', array('user' => $u));
        $this->load->view('footer');
    }

    function active_user() {
        if ($id != 0) {
            $user = new User();
            $user->get_where(array('id' => $id));

            if (empty($user->id)) {
                $user->active = true;

                if ($user->save()) {

                    $this->user_list();
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

                    $this->user_list();
                } else {
                    $user->error_message('active', 'Error to inactive user');
                }
            }
        }
    }

    function user_list() {
        $user = new User();

        $user->get();

        $this->load->view('header', array('title' => 'User List'));
        $this->load->view('account/list', array('users' => $user));
        $this->load->view('footer');
    }

}

?>
