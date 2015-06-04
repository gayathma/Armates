<?php

class Article_images_service extends CI_Model {
    /*
     * Insert data into temp images table
     */

    function add_new_images($article_images_model) {
        return $this->db->insert('article_images', $article_images_model);
    }

    function get_last_article_id() {
        $this->db->select('id');
        $this->db->from('articles');
        $this->db->order_by("id", "desc");
        $this->db->limit(1);
        $query = $this->db->get();

        return $query->row();
    }

    function get_images_for_article($article_id) {
        $this->db->select('*');
        $this->db->from('article_images');
        $this->db->where("article_id", $article_id);
        $this->db->where("is_published", "1");
        $this->db->where("is_deleted", "0");
        $query = $this->db->get();

        return $query->result();
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

    function delete_image($image_id) {
        $data = array('is_deleted' => '1');
        $this->db->where('id', $image_id);
        return $this->db->update('article_images', $data);
    }

    function main_image($image_id, $status) {
        $data = array('is_main' => $status);
        $this->db->where('id', $image_id);
        return $this->db->update('article_images', $data);
    }

}
