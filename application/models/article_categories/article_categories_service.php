<?php

class Article_categories_service extends CI_Model {

  

    /*
     * This is the service function to add a new comapny
     */

    function add_new_article_categories($article_categories_model) {
        return $this->db->insert('article_categories', $article_categories_model);
    }

    /*
     * This is the service function to get all article_categoriess
     */

    public function get_all_article_categoriess() {

        $this->db->select('article_categories.*,user.name as added_by_user');
        $this->db->from('article_categories');
        $this->db->join('user', 'user.id = article_categories.added_by');
        $this->db->where('article_categories.is_deleted', '0');
        $this->db->order_by("article_categories.added_date", "desc");
        $query = $this->db->get();
        return $query->result();
    }

    /*
     * This service function is to delete a article_categories
     */

    function delete_article_categories($article_categories_id) {
        $data = array('is_deleted' => '1');
        $this->db->where('id', $article_categories_id);
        return $this->db->update('article_categories', $data);
    }

    /*
     * This service function is to update publish status of a article_categories
     */

    public function publish_article_categories($article_categories_model) {
        $data = array('is_published' => $article_categories_model->get_is_published());
        $this->db->update('article_categories', $data, array('id' => $article_categories_model->get_id()));
        return $this->db->affected_rows();
    }

    //update article_categories
    function update_article_categories($article_categories_model) {

        $data = array('name' => $article_categories_model->get_name(),
            'updated_date' => $article_categories_model->get_updated_date(),
            'updated_by' => $article_categories_model->get_updated_by()
        );

        $this->db->where('id', $article_categories_model->get_id());
        return $this->db->update('article_categories', $data);
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
