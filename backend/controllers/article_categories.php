<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Article_categories extends CI_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->session->userdata('USER_LOGGED_IN')) {
            redirect(site_url() . '/login/load_login');
        } else {
            $this->load->model('article_categories/article_categories_model');
            $this->load->model('article_categories/article_categories_service');

            $this->load->model('access_controll/access_controll_service');
        }
    }

    function manage_article_categoriess() {

        $article_categories_service = new Article_categories_service();

        $data['heading'] = "Manage Transmissions";
        $data['results'] = $article_categories_service->get_all_article_categoriess();

        $parials = array('content' => 'article_categories/manage_article_categories_view');
        $this->template->load('template/main_template', $parials, $data);
    }

    function add_article_categories() {

        $article_categories_model = new Article_categories_model();
        $article_categories_service = new Article_categories_service();

        $article_categories_model->set_name($this->input->post('name', TRUE));
        $article_categories_model->set_added_by($this->session->userdata('USER_ID'));
        $article_categories_model->set_added_date(date("Y-m-d H:i:s"));
        $article_categories_model->set_is_published('1');
        $article_categories_model->set_is_deleted('0');

        echo $article_categories_service->add_new_article_categories($article_categories_model);
    }

    /*
     * This is to delete a article_categories
     */

    function delete_article_categoriess() {

        $article_categories_service = new Article_categories_service();

        echo $article_categories_service->delete_article_categories(trim($this->input->post('id', TRUE)));
    }

    /*
     * This is to change the published status of the article_categories 
     */

    function change_publish_status() {
        $article_categories_model = new Article_categories_model();
        $article_categories_service = new Article_categories_service();

        $article_categories_model->set_id(trim($this->input->post('id', TRUE)));
        $article_categories_model->set_is_published(trim($this->input->post('value', TRUE)));

        echo $article_categories_service->publish_article_categories($article_categories_model);
    }

    /*
     * Edit article_categories pop up content set up and then send .
     */

    function load_edit_article_categories_content() {
        $article_categories_model = new Article_categories_model();
        $article_categories_service = new Article_categories_service();

        $article_categories_model->set_id(trim($this->input->post('article_categories_id', TRUE)));
        $article_categories = $article_categories_service->get_article_categories_by_id($article_categories_model);
        $data['article_categories'] = $article_categories;


        echo $this->load->view('article_categories/article_categories_edit_pop_up', $data, TRUE);
    }

    /*
     * This function is to update the article_categories details
     */

    function edit_article_categories() {

        $article_categories_model = new Article_categories_model();
        $article_categories_service = new Article_categories_service();

        $article_categories_model->set_id($this->input->post('article_categories_id', TRUE));
        $article_categories_model->set_name($this->input->post('name', TRUE));
        $article_categories_model->set_updated_by($this->session->userdata('USER_ID'));
        $article_categories_model->set_updated_date(date("Y-m-d H:i:s"));

        echo $article_categories_service->update_article_categories($article_categories_model);
    }

}
