<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Comments extends CI_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->session->userdata('USER_LOGGED_IN')) {
            redirect(site_url() . '/login/load_login');
        } else {
            $this->load->model('comments/comments_model');
            $this->load->model('comments/comments_service');
             $this->load->model('access_controll/access_controll_service');
        }
    }

    function manage_comments() {

        $comments_service = new Comments_service();

        $data['heading'] = "Manage Reviews";
        $data['results'] = $comments_service->get_all_comments();

        $parials = array('content' => 'comments/manage_comments_view');
        $this->template->load('template/main_template', $parials, $data);
    }

    function delete_comments() {
        $comments_service = new Comments_service();
        echo $comments_service->delete_comment(trim($this->input->post('id', TRUE)));
    }

    /*
     * change the publish status of the comments
     */

    function change_publish_status() {
        $comments_model = new Comments_model();
        $comments_service = new Comments_service();

        $comments_model->set_id(trim($this->input->post('id', TRUE)));
        $comments_model->set_is_published(trim($this->input->post('value', TRUE)));

        echo $comments_service->publish_comment($comments_model);
    }

}
