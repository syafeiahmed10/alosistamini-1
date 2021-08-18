<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Reg__district_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get reg__district by id
     */
    function get_reg__district($id)
    {
        return $this->db->get_where('reg__districts',array('id'=>$id))->row_array();
    }
    
    /*
     * Get all reg__districts count
     */
    function get_all_reg__districts_count()
    {
        $this->db->from('reg__districts');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all reg__districts
     */
    function get_all_reg__districts($params = array())
    {
        $this->db->order_by('id', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('reg__districts')->result_array();
    }
        
    /*
     * function to add new reg__district
     */
    function add_reg__district($params)
    {
        $this->db->insert('reg__districts',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update reg__district
     */
    function update_reg__district($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('reg__districts',$params);
    }
    
    /*
     * function to delete reg__district
     */
    function delete_reg__district($id)
    {
        return $this->db->delete('reg__districts',array('id'=>$id));
    }
}