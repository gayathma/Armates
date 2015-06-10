<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('articles/articles_model');
        $this->load->model('articles/articles_service');

        $this->load->model('article_categories/article_categories_model');
        $this->load->model('article_categories/article_categories_service');

        $this->load->model('article_images/article_images_model');
        $this->load->model('article_images/article_images_service');

        $this->load->model('comments/comments_model');
        $this->load->model('comments/comments_service');

        $this->load->model('content/content_model');
        $this->load->model('content/content_service');
    }

    function index() {

        $articles_service    = new Articles_service();
        $article_cat_service = new Article_categories_service();
        $content_model       = new Content_model();
        $content_service     = new Content_service();

        $data['results'] = $articles_service->get_all_articles();
        $data['cats']    = $article_cat_service->get_all_article_categories();

        $content_model->set_content_hcode('ABOUTUS');
        $data['about'] = $content_service->get_content_by_hcode($content_model);

        $content_model->set_content_hcode('BLOG');
        $data['blog'] = $content_service->get_content_by_hcode($content_model);

        $parials = array('content' => 'article_list_view', 'nav' => 'template/nav', 'contact' => 'template/contact', 'pages' => 'template/pages');
        $this->template->load('template/main_template', $parials, $data);
    }

    function article_detail($article_id) {

        $articles_service        = new Articles_service();
        $articles_images_service = new Article_images_service();
        $article_cat_service     = new Article_categories_service();
        $content_model       = new Content_model();
        $content_service     = new Content_service();

        $data['results'] = $articles_service->get_all_articles();
        $data['cats']    = $article_cat_service->get_all_article_categories();

        $content_model->set_content_hcode('ABOUTUS');
        $data['about'] = $content_service->get_content_by_hcode($content_model);

        $content_model->set_content_hcode('BLOG');
        $data['blog'] = $content_service->get_content_by_hcode($content_model);

        $data['article']        = $articles_service->get_article_by_id($article_id);
        $data['article_images'] = $articles_images_service->get_images_for_article($article_id);
        $data['cats']           = $article_cat_service->get_all_article_categories();

        $next               = $articles_service->get_next_article($article_id);
        $data['next']       = $next;
        $data['next_image'] = NULL;
        if (!empty($next)) {
            $data['next_image'] = $articles_images_service->get_main_image_for_article($next->id);
        }

        $prev               = $articles_service->get_prev_article($article_id);
        $data['prev']       = $prev;
        $data['prev_image'] = NULL;
        if (!empty($prev)) {
            $data['prev_image'] = $articles_images_service->get_main_image_for_article($prev->id);
        }

        $parials = array('content' => 'article_detail_view', 'nav' => 'template/nav', 'contact' => 'template/contact', 'pages' => 'template/pages');
        $this->template->load('template/main_template', $parials, $data);
    }

    function send_contact_request() {
        $comments_model   = new Comments_model();
        $comments_service = new Comments_service();

        $comments_model->set_name($this->input->post('name', TRUE));
        $comments_model->set_email($this->input->post('email', TRUE));
        $comments_model->set_description($this->input->post('description', TRUE));
        echo $comments_service->add_comment($comments_model);
    }

}
