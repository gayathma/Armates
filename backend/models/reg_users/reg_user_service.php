<?php

class Reg_User_Service extends CI_Model{
    
    function __construct() {
        parent::__construct();
        $this->load->model('reg_users/reg_user_model');          
    }
    
    function get_reg_user_details(){
        
        $this->db->select('user.*, user_type.type');
        $this->db->from('user');
        $this->db->join('user_type', 'user.user_type= user_type.id');
        $this->db->where('user_type.id','3');
        $this->db->where('user.is_deleted', '0');
        $this->db->order_by("user.added_date", "desc");
        $query = $this->db->get();
        return $query->result();
    }
    /*
     * To authenticate access to registered users
     */
    function authenticate_reg_user_with_password($reg_user_model){
        
        $data=array('user_name'=>$reg_user_model->get_user_name(), 'password'=>$user_model->get_password(), 'is_deleted'=>'0', 'is_published'=>'1');
        
        $this->db->select('user.*, user_type.name as user_type_name');
        $this->db->from('user');
        $this->db->join('user_type', 'user.user_type=user_type.id');
        $this->db->where($data);
        $query=$this->db->get();
        return $query->row();
    }

    /*
    * To get all active registered users
    */
    function get_all_active_registered_users() {
        
        $this->db->select('user.*');
        $this->db->from('user');
        $this->db->where('user_type', 3);
        $this->db->where('is_published', '1');
        $this->db->where('is_deleted', '0');
        $this->db->order_by("user.added_date", "desc");
        $query = $this->db->get();
        return $query->result();
    }
    /*
     * To get registered user details by passing the id as the parameter 
     */
    function get_reg_user_by_id($reg_user_model) {

        $data = array('id' => $reg_user_model->get_id(), 'is_deleted' => '0');
        $query = $this->db->get_where('user', $data);
        return $query->row();
    }
    
    /*
     * To get registered users from the first letter of their name
     */
    
    function get_reg_user_by_name($letter){
        $this->db->select('user.*, user_type.type');
        $this->db->from('user');
        $this->db->join('user_type', 'user.user_type=user_type.id');
        $this->db->where('user_type.id in (3)');
        $this->db->where('user.name like "'.$letter.'%"');
        $this->db->where('user.is_deleted', '0');
        $this->db->order_by("user.added_date","desc");
        
        $query=$this->db->get();
        return $query->result();
    }
    
    /*
     * To get the online status of the user
     */
    function update_reg_user_online_status($reg_user_model){
        
        $data=  array('is_online'=>$reg_user_model->get_is_online());
        $this->db->where('id', $reg_user_model->get_id());
        return $this->db->update('user', $data);
        
    }
    /*
     * To delete the users
     */
    function delete_reg_users($user_id){
        $data=array('is_deleted'=>'1');
        $this->db->where('id', $user_id);
        return $this->db->update('user', $data);
        
    }
    /*
     * change the disable status of the user
     */
    function publish_status_of_reg_user($reg_user_model){
        $data=array('is_published'=>$reg_user_model->get_is_published());
        $this->db->update('user', $data, array('id' => $reg_user_model->get_id()));
        return $this->db->affected_rows();
    }
    
    
    
    
    
      
    
    

}
