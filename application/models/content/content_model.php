<?php

class Content_model extends CI_Model {

    var $content_id;
    var $content_title;
    var $content;
    var $content_hcode;
    var $delete_status;
    var $added_by;
    var $added_date;
    var $updated_by;
    var $updated_date;

    function __construct() {
        parent::__construct();
    }

    public function get_content_id() {
        return $this->content_id;
    }

    public function get_content_title() {
        return $this->content_title;
    }

    public function get_content() {
        return $this->content;
    }

    public function get_content_hcode() {
        return $this->content_hcode;
    }

    public function get_delete_status() {
        return $this->delete_status;
    }

    public function get_added_by() {
        return $this->added_by;
    }

    public function get_added_date() {
        return $this->added_date;
    }

    public function get_updated_by() {
        return $this->updated_by;
    }

    public function get_updated_date() {
        return $this->updated_date;
    }

    public function set_content_id($content_id) {
        $this->content_id = $content_id;
    }

    public function set_content_title($content_title) {
        $this->content_title = $content_title;
    }

    public function set_content($content) {
        $this->content = $content;
    }

    public function set_content_hcode($content_hcode) {
        $this->content_hcode = $content_hcode;
    }

    public function set_delete_status($delete_status) {
        $this->delete_status = $delete_status;
    }

    public function set_added_by($added_by) {
        $this->added_by = $added_by;
    }

    public function set_added_date($added_date) {
        $this->added_date = $added_date;
    }

    public function set_updated_by($updated_by) {
        $this->updated_by = $updated_by;
    }

    public function set_updated_date($updated_date) {
        $this->updated_date = $updated_date;
    }

}

?>
