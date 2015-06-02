<?php

class Comments_service extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->model('comments/comments_model');
    }
    
     public function get_all_comments() {

        $this->db->select('*');
        $this->db->from('comment');
        $this->db->where('comment.is_deleted', '0');
        $this->db->order_by("comment.added_date", "desc");
        $query = $this->db->get();
        return $query->result();
    }
    
    public function delete_comment($comment_id) {
        $data = array('is_deleted' => '1');
        $this->db->where('id', $comment_id);
        return $this->db->update('comment', $data);
    }

    /*
     * service function to update publish status of a comments
     */

    public function publish_comment($comment_model) {
        $data = array('is_published' => $comment_model->get_is_published());
        $this->db->update('comment', $data, array('id' => $comment_model->get_id()));
        return $this->db->affected_rows();
    }
}

