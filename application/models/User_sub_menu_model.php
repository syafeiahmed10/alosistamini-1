<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class User_sub_menu_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get user_sub_menu by id
     */
    function get_user_sub_menu($id)
    {
        return $this->db->get_where('user_sub_menu',array('id'=>$id))->row_array();
    }
        
    /*
     * Get all user_sub_menu
     */
    function get_all_user_sub_menu()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('user_sub_menu')->result_array();
    }
        
    /*
     * function to add new user_sub_menu
     */
    function add_user_sub_menu($params)
    {
        $this->db->insert('user_sub_menu',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update user_sub_menu
     */
    function update_user_sub_menu($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('user_sub_menu',$params);
    }
    
    /*
     * function to delete user_sub_menu
     */
    function delete_user_sub_menu($id)
    {
        return $this->db->delete('user_sub_menu',array('id'=>$id));
    }
}
