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
    }

    function index() {

        $articles_service = new Articles_service();

        $data['results'] = $articles_service->get_all_articles();

        $parials = array('content' => 'article_list_view');
        $this->template->load('template/main_template', $parials, $data);
    }
    
    function article_detail($id) {

        $articles_service = new Articles_service();
        $articles_images_service = new Article_images_service();

        $data['article'] = $articles_service->get_article_by_id($id);
        $data['article_images'] = $articles_images_service->get_images_for_article($id);

        $parials = array('content' => 'article_detail_view');
        $this->template->load('template/main_template', $parials, $data);
    }

}
