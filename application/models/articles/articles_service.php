<?php

class Articles_service extends CI_Model {

    public function get_all_articles() {

        $this->db->select('articles.*,article_categories.name as category_name');
        $this->db->from('articles');
        $this->db->join('article_categories', 'article_categories.id = articles.article_category');
        $this->db->where('articles.is_deleted', '0');
        $this->db->where('articles.is_published', '1');
        $this->db->order_by("articles.added_date", "desc");
        $this->db->group_by('articles.id');
        $query = $this->db->get();
        return $query->result();
    }

    function add_new_article($article_model) {
        return $this->db->insert('articles', $article_model);
    }

    /*
     * This service function is to delete a articles
     */

    function delete_article($article_id) {
        $data = array('is_deleted' => '1');
        $this->db->where('id', $article_id);
        return $this->db->update('articles', $data);
    }

    /*
     * This is the service function to get all approved articles
     */

    public function get_approved_articles() {

        $this->db->select('articles.*,user.name as added_by_user,'
                . 'manufacture.name as manufacture,model.name as model,'
                . 'transmission.name as transmission,fuel_type.name as fuel_type,'
                . 'body_type.name as body_type');
        $this->db->from('articles');
        $this->db->join('manufacture', 'manufacture.id = articles.manufacture_id');
        $this->db->join('model', 'model.id = articles.model_id');
        $this->db->join('transmission', 'transmission.id = articles.transmission_id');
        $this->db->join('fuel_type', 'fuel_type.id = articles.fuel_type_id');
        $this->db->join('body_type', 'body_type.id = articles.body_type_id');
        $this->db->join('user', 'user.id = articles.added_by');
        $this->db->where('articles.is_deleted', '0');
        $this->db->where('articles.is_published', '1');
        $this->db->order_by("articles.added_date", "desc");
        $query = $this->db->get();
        return $query->result();
    }

    /*
     * This service function is to update publish status of a article
     */

    public function publish_article($vehicle_advertisments_model) {
        $data = array('is_published' => $vehicle_advertisments_model->get_is_published());
        $this->db->update('articles', $data, array('id' => $vehicle_advertisments_model->get_id()));
        return $this->db->affected_rows();
    }

    function get_article_by_id($id) {


        $this->db->select('articles.*,article_categories.name as category_name');
        $this->db->from('articles');
        $this->db->join('article_categories', 'article_categories.id = articles.article_category');
        $this->db->where('articles.is_deleted', '0');
        $this->db->where('articles.is_published', '1');
        $this->db->where('articles.id', $id);
        $query = $this->db->get();
        return $query->row();
    }

}
