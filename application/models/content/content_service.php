<?php
class Content_service extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_content_by_hcode($content_model) {
        $query = $this->db->get_where('contents', array(
            'content_hcode' => $content_model->get_content_hcode()
        ));
        return $query->row();
    }

}

?>
