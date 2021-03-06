<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Reg__district extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Reg__district_model');
    } 

    /*
     * Listing of reg__districts
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('reg__district/index?');
        $config['total_rows'] = $this->Reg__district_model->get_all_reg__districts_count();
        $this->pagination->initialize($config);

        $data['reg__districts'] = $this->Reg__district_model->get_all_reg__districts($params);
        
        $data['_view'] = 'reg__district/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new reg__district
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'regency_id' => $this->input->post('regency_id'),
				'name' => $this->input->post('name'),
            );
            
            $reg__district_id = $this->Reg__district_model->add_reg__district($params);
            redirect('reg__district/index');
        }
        else
        {            
            $data['_view'] = 'reg__district/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a reg__district
     */
    function edit($id)
    {   
        // check if the reg__district exists before trying to edit it
        $data['reg__district'] = $this->Reg__district_model->get_reg__district($id);
        
        if(isset($data['reg__district']['id']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'regency_id' => $this->input->post('regency_id'),
					'name' => $this->input->post('name'),
                );

                $this->Reg__district_model->update_reg__district($id,$params);            
                redirect('reg__district/index');
            }
            else
            {
                $data['_view'] = 'reg__district/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The reg__district you are trying to edit does not exist.');
    } 

    /*
     * Deleting reg__district
     */
    function remove($id)
    {
        $reg__district = $this->Reg__district_model->get_reg__district($id);

        // check if the reg__district exists before trying to delete it
        if(isset($reg__district['id']))
        {
            $this->Reg__district_model->delete_reg__district($id);
            redirect('reg__district/index');
        }
        else
            show_error('The reg__district you are trying to delete does not exist.');
    }
    
}
