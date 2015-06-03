<?php

class Articles_model extends CI_Model {

    var $id;
    var $article_category;
    var $title;
    var $client;
    var $challenge;
    var $solution;
    var $result;
    var $description;
    var $css_class;
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

    public function get_article_category() {
        return $this->article_category;
    }

    public function set_article_category($article_category) {
        $this->article_category = $article_category;
    }

    public function get_title() {
        return $this->title;
    }

    public function set_title($title) {
        $this->title = $title;
    }

    public function get_client() {
        return $this->client;
    }

    public function set_client($client) {
        $this->client = $client;
    }

    public function get_challenge() {
        return $this->challenge;
    }

    public function set_challenge($challenge) {
        $this->challenge = $challenge;
    }

    public function get_solution() {
        return $this->solution;
    }

    public function set_solution($solution) {
        $this->solution = $solution;
    }

    public function get_result() {
        return $this->result;
    }

    public function set_result($result) {
        $this->result = $result;
    }

    public function get_description() {
        return $this->description;
    }

    public function set_description($description) {
        $this->description = $description;
    }

    public function get_css_class() {
        return $this->css_class;
    }

    public function set_css_class($css_class) {
        $this->css_class = $css_class;
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
