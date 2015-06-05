<?php

class User_log_model extends CI_Model {

    var $id;
    var $action;
    var $date;
    var $uri;
    var $post_data;
    var $ip;
    var $browser;

    function __construct() {
        parent::__construct();
    }

    public function get_id() {
        return $this->id;
    }

    public function get_action() {
        return $this->action;
    }

    public function get_date() {
        return $this->date;
    }

    public function get_uri() {
        return $this->uri;
    }

    public function get_post_data() {
        return $this->post_data;
    }

    public function get_ip() {
        return $this->ip;
    }

    public function get_browser() {
        return $this->browser;
    }

    public function set_id($id) {
        $this->id = $id;
    }

    public function set_action($action) {
        $this->action = $action;
    }

    public function set_date($date) {
        $this->date = $date;
    }

    public function set_uri($uri) {
        $this->uri = $uri;
    }

    public function set_post_data($post_data) {
        $this->post_data = $post_data;
    }

    public function set_ip($ip) {
        $this->ip = $ip;
    }

    public function set_browser($browser) {
        $this->browser = $browser;
    }

}

?>
