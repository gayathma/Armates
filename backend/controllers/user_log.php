<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_log extends CI_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->session->userdata('USER_LOGGED_IN')) {
            redirect(site_url() . '/login/load_login');
        } else {
            $this->load->model('user_log/user_log_model');
            $this->load->model('user_log/user_log_service');
        }
    }

    function manage_user_log() {

        $user_log_service = new User_log_service();

        $data['heading'] = "Manage User Log";
        $data['results'] = $user_log_service->get_log();

        $parials = array('content' => 'user_log/manage_user_log_view');
        $this->template->load('template/main_template', $parials, $data);
    }
}
