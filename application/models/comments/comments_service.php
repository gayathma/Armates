<?php

class Comments_service extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function add_comment($comment_model) {
        return $this->db->insert('comment', $comment_model);
    }

}
