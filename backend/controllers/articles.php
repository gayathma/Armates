<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Articles extends CI_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->session->userdata('USER_LOGGED_IN')) {
            redirect(site_url() . '/login/load_login');
        } else {
            $this->load->model('articles/articles_model');
            $this->load->model('articles/articles_service');

            $this->load->model('users/user_model');
            $this->load->model('users/user_service');

            $this->load->model('access_controll/access_controll_service');

            $this->load->model('article_categories/article_categories_model');
            $this->load->model('article_categories/article_categories_service');

            $this->load->model('article_images/article_images_model');
            $this->load->model('article_images/article_images_service');
        }
    }

    function manage_articles() {

        $perm = Access_controll_service::check_access('ADD_ADVERTISEMENT');
        if ($perm) {
            $articles_service = new Articles_service();
            $user_service     = new User_service();

            $data['heading']   = "Advertisements";
            $data['results']   = $articles_service->get_all_articles();
            $data['reg_users'] = $user_service->get_all_active_registered_users();


            $parials = array('content' => 'articles/manage_articles_view');
            $this->template->load('template/main_template', $parials, $data);
        }
    }

    function add_article_view() {

        $article_categories_service = new Article_categories_service();


        $data['heading']     = "Add New Article";
        $data['categories']  = $article_categories_service->get_all_article_categoriess();
        $data['css_classes'] = $this->config->item('css_classes');

        $parials = array('content' => 'articles/add_new_article');
        $this->template->load('template/main_template', $parials, $data);
    }

    function save_article() {
        $articles_service = new Articles_service();
        $articles_model   = new Articles_model();

        $articles_model->set_article_category($this->input->post('category', TRUE));
        $articles_model->set_title($this->input->post('title', TRUE));
        $articles_model->set_client($this->input->post('client', TRUE));
        $articles_model->set_challenge($this->input->post('challenge', TRUE));
        $articles_model->set_solution($this->input->post('solution', TRUE));
        $articles_model->set_result($this->input->post('result', TRUE));
        $articles_model->set_description($this->input->post('description', TRUE));
        $articles_model->set_css_class($this->input->post('css_class', TRUE));
        $articles_model->set_added_by($this->session->userdata('USER_ID'));
        $articles_model->set_added_date(date("Y-m-d H:i:s"));
        $articles_model->set_is_published('1');
        $articles_model->set_is_deleted('0');

        echo $articles_service->add_new_article($articles_model);
    }

    function upload_images($id) {



        $data['heading'] = "Upload Images";
        $data['id']      = $id;


        $parials = array('content' => 'articles/upload_images');
        $this->template->load('template/main_template', $parials, $data);
    }

    /*
     *  This function is to search articles
     */

    function search_articles() {

        $articles_service = new Articles_service();

        $data['results'] = $articles_service->search_articles();

        $this->load->view('articles/search_results_articles', $data);
    }

    /*
     * This is to delete a articles
     */

    function delete_articles() {

        $articles_service = new Articles_service();

        echo $articles_service->delete_articles(trim($this->input->post('id', TRUE)));
    }

    /*
     * This is to approve or reject articles
     */

    function change_publish_status() {
        $articles_model   = new Vehicle_advertisments_model();
        $articles_service = new Articles_service();

        $articles_model->set_id(trim($this->input->post('id', TRUE)));
        $articles_model->set_is_published(trim($this->input->post('value', TRUE)));

        echo $articles_service->publish_articles($articles_model);
    }

    function add_article_images() {

        $article_images_model   = new Article_images_model();
        $article_images_service = new Article_images_service();

        $files = $this->input->post('file_name', TRUE);
        foreach ($files as $file) {

            $article_images_model->set_article_id($this->input->post('id', TRUE));
            $article_images_model->set_image_path($file);
            $article_images_model->set_is_published('1');
            $article_images_model->set_is_deleted('0');
            $article_images_model->set_added_date(date("Y-m-d H:i:s"));
            $article_images_model->set_added_by($this->session->userdata('USER_ID'));


            echo $article_images_service->add_new_images($article_images_model);
        }
    }

    function edit_article($article_id) {

        $perm = Access_controll_service::check_access('EDIT_ADVERTISEMENT');
        if ($perm) {
            $articles_service           = new Articles_service();
            $article_categories_service = new Article_categories_service();

            $data['heading']     = "Edit Article";
            $data['article']     = $articles_service->get_article_by_id($article_id);
            $data['categories']  = $article_categories_service->get_all_article_categoriess();
            $data['css_classes'] = $this->config->item('css_classes');

            $parials = array('content' => 'articles/edit_new_article');
            $this->template->load('template/main_template', $parials, $data);
        }
    }

    function update_article() {
        $articles_service = new Articles_service();
        $articles_model   = new Articles_model();

        $articles_model->set_id($this->input->post('article_id', TRUE));
        $articles_model->set_article_category($this->input->post('category', TRUE));
        $articles_model->set_title($this->input->post('title', TRUE));
        $articles_model->set_client($this->input->post('client', TRUE));
        $articles_model->set_challenge($this->input->post('challenge', TRUE));
        $articles_model->set_solution($this->input->post('solution', TRUE));
        $articles_model->set_result($this->input->post('result', TRUE));
        $articles_model->set_description($this->input->post('description', TRUE));
        $articles_model->set_css_class($this->input->post('css_class', TRUE));
        $articles_model->set_updated_by($this->session->userdata('USER_ID'));
        $articles_model->set_updated_date(date("Y-m-d H:i:s"));

        echo $articles_service->update_article($articles_model);
    }

}
