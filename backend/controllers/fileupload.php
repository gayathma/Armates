<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Fileupload extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('article_images/article_images_model');
        $this->load->model('article_images/article_images_service');
    }

    function index() {

        error_reporting(E_ALL | E_STRICT);
        $this->load->library("UploadHandler");
    }

    function custom_init($folder) {
        $_POST['last_article_id'] = $folder;
        error_reporting(E_ALL | E_STRICT);
        $this->load->library("UploadHandler");
    }

    public function deleteFile($last_article_id, $file) {
        $fcpath        = FCPATH . 'uploads\\articles\\ar_' . $last_article_id . '\\';
        $success       = unlink($fcpath . rawurldecode(preg_replace(
                                '/(^[^"]+")|("$)/', '', $file
        ))); //PHP function was does the actual file deletion
        $success       = unlink($fcpath . 'thumbnail\\' . rawurldecode(preg_replace(
                                '/(^[^"]+")|("$)/', '', $file
        ))); //PHP function was does the actual file deletion
        $res           = array();
        $f             = 'articles/ar_' . $last_article_id . '/' . $file;
        $thumb         = 'articles/ar_' . $last_article_id . '/thumbnail/' . $file;
        $res["$f"]     = true;
        $res["$thumb"] = true;

        $article_images_service = new Article_images_service();
        $image                  = $article_images_service->get_image($file);
        if (!empty($image)) {
            $article_images_service->delete_image($image->id);
        }

        print_r(json_encode($res));
        die;
    }

}