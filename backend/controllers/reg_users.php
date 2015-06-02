<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reg_Users extends CI_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->session->userdata('USER_LOGGED_IN')) {
            redirect(site_url() . '/login/load_login');
        } else {
            $this->load->model('reg_users/reg_user_model');
            $this->load->model('reg_users/reg_user_service');

            $this->load->model('access_controll/access_controll_service');
        }
    }

    function manage_registered_users() {
        $reg_user_service = new Reg_User_service();
        $reg_user_model = new Reg_User_model();

        $data['heading'] = "Manage Registered Users";
        $data['results'] = $reg_user_service->get_reg_user_details();        

        $parials = array('content' => 'reg_users/manage_reg_user_view');
        $this->template->load('template/main_template', $parials, $data);
    }

    /*
     * Function to load the registered user profile, edit and send
     */

    function load_registered_user_profile() {
        $reg_user_model = new Reg_User_model();
        $reg_user_service = new Reg_User_service();

        $reg_user_model->set_id(trim($this->input->post('user_id', TRUE)));
        $reg_user_type = $reg_user_service->get_reg_user_by_id($reg_user_model);
        $data['user'] = $user_type;

        echo $this->load->view('reg_users/manage_reg_user_profile_view', $data, TRUE);
    }

    /*
     * Function to filtr the registered users based on the first letter of their name
     */

    function load_reg_users_by_letter() {
        $reg_user_service = new Reg_User_Service();

        $letter = $this->input->post('myletter', TRUE);
        $user_type = $reg_user_service->get_reg_user_by_name($letter);

        $data['results'] = $user_type;

        $this->load->view('reg_users/reg_user_filter_view', $data);
    }

    /*
     * Function to delete registered users
     */

    function delete_reg_users() {
        $reg_user_service = new Reg_User_Service();
        echo $reg_user_service->delete_reg_users(trim($this->input->post('user_id', TRUE)));
    }

    /*
     * Function to change the publish status of a registered user
     */

    function change_publish_status() {
        $reg_user_model = new Reg_User_model();
        $reg_user_service = new Reg_User_Service();

        $reg_user_model->set_id(trim($this->input->post('id', TRUE)));
        $reg_user_model->set_is_published(trim($this->input->post('value', TRUE)));

        echo $reg_user_service->publish_status_of_reg_user($reg_user_model);
    }

}
