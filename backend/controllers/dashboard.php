<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html 
     */
    function __construct() {

        parent::__construct();


        $this->load->model('reg_users/reg_user_model');
        $this->load->model('reg_users/reg_user_service');

        $this->load->model('articles/articles_model');
        $this->load->model('articles/articles_service');

        $this->load->model('comments/comments_model');
        $this->load->model('comments/comments_service');

        $this->load->model('access_controll/access_controll_service');
    }

    function index() {

        $reg_user_service = new Reg_User_Service();
        $articles_service = new Articles_service();
        $comments_service = new Comments_service();

        $data['heading']        = 'Dashboard';
        $data['reg_user_count'] = count($reg_user_service->get_reg_user_details());
        $data['approved_count'] = count($articles_service->get_all_articles());
//        $data['pending_count']  = count($articles_service->get_pending_advertisements());
        $data['reviews_count']  = count($comments_service->get_all_comments());


        $partials = array('content' => 'dashboard/dashboard_view');
        $this->template->load('template/main_template', $partials, $data);
    }

}