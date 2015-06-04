<?php

class Article_images_service extends CI_Model {

    

    function get_images_for_article($article_id) {
        $this->db->select('*');
        $this->db->from('article_images');
        $this->db->where("article_id", $article_id);
        $this->db->where("is_published", "1");
        $this->db->where("is_deleted", "0");
        $query = $this->db->get();

        return $query->result();
    }
    
    function get_main_image_for_article($article_id) {
        $this->db->select('*');
        $this->db->from('article_images');
        $this->db->where("article_id", $article_id);
        $this->db->where("is_main", "1");
        $this->db->where("is_published", "1");
        $this->db->where("is_deleted", "0");
        $query = $this->db->get();

        return $query->row();
    }
    
    function get_image($image_name) {
        $this->db->select('*');
        $this->db->from('article_images');
        $this->db->where("image_path", $image_name);
        $this->db->where("is_deleted", "0");
        $query = $this->db->get();

        return $query->row();
    }

    function get_images_for_article_one($article_id) {
        $this->db->select('*');
        $this->db->from('article_images');
        $this->db->where("id", $article_id);
        $this->db->where("is_published", "1");
        $this->db->where("is_deleted", "0");
        $this->db->limit("1");
        $query = $this->db->get();

        return $query->row();
    }


}
