<?php

class Article_categories_service extends CI_Model {

  

    /*
     * This is the service function to get all article_categoriess
     */

    public function get_all_article_categories() {

        $this->db->select('article_categories.*,user.name as added_by_user');
        $this->db->from('article_categories');
        $this->db->join('user', 'user.id = article_categories.added_by');
        $this->db->where('article_categories.is_deleted', '0');
        $this->db->order_by("article_categories.name");
        $query = $this->db->get();
        return $query->result();
    }

    /*
     * This is the service function to get article_categories detail by  passing the 
     * article_categories_id as a parameter
     */

    function get_article_categories_by_id($article_categories_model) {

        $query = $this->db->get_where('article_categories', array('id' => $article_categories_model->get_id(), 'is_deleted' => '0'));
        return $query->row();
    }

}
