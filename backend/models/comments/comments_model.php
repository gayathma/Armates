<?php

class Comments_model extends CI_Model {

    var $id;
    var $vehicle_id;
    var $title;
    var $description;
    var $is_published;
    var $is_deleted;
    var $added_date;
    var $added_by;
    var $updated_date;
    var $updated_by;

    public function get_id() {
        return $this->id;
    }

    public function get_vehicle_id() {
        return $this->vehicle_id;
    }

    public function get_title() {
        return $this->title;
    }

    public function get_description() {
        return $this->description;
    }

    public function get_is_published() {
        return $this->is_published;
    }

    public function get_is_deleted() {
        return $this->is_deleted;
    }

    public function get_added_date() {
        return $this->added_date;
    }

    public function get_added_by() {
        return $this->added_by;
    }

    public function get_updated_date() {
        return $this->updated_date;
    }

    public function get_updated_by() {
        return $this->updated_by;
    }

    public function set_id($id) {
        $this->id = $id;
    }

    public function set_vehicle_id($vehicle_id) {
        $this->vehicle_id = $vehicle_id;
    }

    public function set_title($title) {
        $this->title = $title;
    }

    public function set_description($description) {
        $this->description = $description;
    }

    public function set_is_published($is_published) {
        $this->is_published = $is_published;
    }

    public function set_is_deleted($is_deleted) {
        $this->is_deleted = $is_deleted;
    }

    public function set_added_date($added_date) {
        $this->added_date = $added_date;
    }

    public function set_added_by($added_by) {
        $this->added_by = $added_by;
    }

    public function set_updated_date($updated_date) {
        $this->updated_date = $updated_date;
    }

    public function set_updated_by($updated_by) {
        $this->updated_by = $updated_by;
    }

}
