<?php

class Article_images_model extends CI_Model {

    var $id;
    var $article_id;
    var $is_main;
    var $image_path;
    var $is_published;
    var $is_deleted;
    var $added_date;
    var $added_by;
    var $updated_date;
    var $updated_by;

    function __construct() {
        parent::__construct();
    }

    public function get_id() {
        return $this->id;
    }

    public function set_id($id) {
        $this->id = $id;
    }

    public function get_article_id() {
        return $this->article_id;
    }

    public function set_article_id($article_id) {
        $this->article_id = $article_id;
    }

    public function get_is_main() {
        return $this->is_main;
    }

    public function set_is_main($is_main) {
        $this->is_main = $is_main;
    }

    public function get_image_path() {
        return $this->image_path;
    }

    public function set_image_path($image_path) {
        $this->image_path = $image_path;
    }

    public function get_is_published() {
        return $this->is_published;
    }

    public function set_is_published($is_published) {
        $this->is_published = $is_published;
    }

    public function get_is_deleted() {
        return $this->is_deleted;
    }

    public function set_is_deleted($is_deleted) {
        $this->is_deleted = $is_deleted;
    }

    public function get_added_date() {
        return $this->added_date;
    }

    public function set_added_date($added_date) {
        $this->added_date = $added_date;
    }

    public function get_added_by() {
        return $this->added_by;
    }

    public function set_added_by($added_by) {
        $this->added_by = $added_by;
    }

    public function get_updated_date() {
        return $this->updated_date;
    }

    public function set_updated_date($updated_date) {
        $this->updated_date = $updated_date;
    }

    public function get_updated_by() {
        return $this->updated_by;
    }

    public function set_updated_by($updated_by) {
        $this->updated_by = $updated_by;
    }

}
