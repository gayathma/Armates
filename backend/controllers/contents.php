<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Contents extends CI_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->session->userdata('USER_LOGGED_IN')) {
            redirect(site_url() . '/login/load_login');
        } else {
            $this->load->model('contents/content_model');
            $this->load->model('contents/content_service');
            $this->load->model('access_controll/access_controll_service');
        }
    }
    

    function load_contents_by_hcode($hcode) {

        $content_model = new Content_model();
        $content_service = new Content_service();

        $content_model->set_content_hcode($hcode);
        $content_data = $content_service->get_content_by_hcode($content_model);

        $data['inner_title'] = $content_data->content_title;

        $data['content_data'] = $content_data;

        $partials = array('content' => 'contents/manage_contents');
        $this->template->load('template/main_template', $partials, $data);
    }

    function update_content() {

        $content_model = new Content_model();
        $content_service = new Content_service();


        $content_model->set_content($this->input->post('content_text'));
        $content_model->set_content_id($this->input->post('content_id'));


        echo $content_service->update_content($content_model);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */