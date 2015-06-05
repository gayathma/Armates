<?php

class User_log_service extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_log() {
        $this->db->select('*');
        $this->db->from("user_log");
        $this->db->order_by('user_log.id', 'DESC');

        $query = $this->db->get();
        $query->result();
    }

}

?>
