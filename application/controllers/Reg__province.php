<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Reg__province extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Reg__province_model');
    } 

    /*
     * Listing of reg__provinces
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('reg__province/index?');
        $config['total_rows'] = $this->Reg__province_model->get_all_reg__provinces_count();
        $this->pagination->initialize($config);

        $data['reg__provinces'] = $this->Reg__province_model->get_all_reg__provinces($params);
        
        $data['_view'] = 'reg__province/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new reg__province
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'name' => $this->input->post('name'),
            );
            
            $reg__province_id = $this->Reg__province_model->add_reg__province($params);
            redirect('reg__province/index');
        }
        else
        {            
            $data['_view'] = 'reg__province/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a reg__province
     */
    function edit($id)
    {   
        // check if the reg__province exists before trying to edit it
        $data['reg__province'] = $this->Reg__province_model->get_reg__province($id);
        
        if(isset($data['reg__province']['id']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'name' => $this->input->post('name'),
                );

                $this->Reg__province_model->update_reg__province($id,$params);            
                redirect('reg__province/index');
            }
            else
            {
                $data['_view'] = 'reg__province/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The reg__province you are trying to edit does not exist.');
    } 

    /*
     * Deleting reg__province
     */
    function remove($id)
    {
        $reg__province = $this->Reg__province_model->get_reg__province($id);

        // check if the reg__province exists before trying to delete it
        if(isset($reg__province['id']))
        {
            $this->Reg__province_model->delete_reg__province($id);
            redirect('reg__province/index');
        }
        else
            show_error('The reg__province you are trying to delete does not exist.');
    }
    
}
