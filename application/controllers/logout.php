<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of logout
 *
 * @author JesusM
 * @date 12-may-2013
 */
class logout extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('login_manager');
    }

    function index() {
        $this->load->helper('url');

        $this->login_manager->logout();

        $this->output->enable_profiler(TRUE);

        redirect(login);
    }

}

?>
