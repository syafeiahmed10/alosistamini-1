<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Kawasan_dropdown__tingkat_kumuh extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kawasan_dropdown__tingkat_kumuh_model');
    } 

    /*
     * Listing of kawasan_dropdown__tingkat_kumuh
     */
    function index()
    {
        $data['kawasan_dropdown__tingkat_kumuh'] = $this->Kawasan_dropdown__tingkat_kumuh_model->get_all_kawasan_dropdown__tingkat_kumuh();
        
        $data['_view'] = 'kawasan_dropdown__tingkat_kumuh/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new kawasan_dropdown__tingkat_kumuh
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'tingkat_kumuh' => $this->input->post('tingkat_kumuh'),
            );
            
            $kawasan_dropdown__tingkat_kumuh_id = $this->Kawasan_dropdown__tingkat_kumuh_model->add_kawasan_dropdown__tingkat_kumuh($params);
            redirect('kawasan_dropdown__tingkat_kumuh/index');
        }
        else
        {            
            $data['_view'] = 'kawasan_dropdown__tingkat_kumuh/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a kawasan_dropdown__tingkat_kumuh
     */
    function edit($id_tk)
    {   
        // check if the kawasan_dropdown__tingkat_kumuh exists before trying to edit it
        $data['kawasan_dropdown__tingkat_kumuh'] = $this->Kawasan_dropdown__tingkat_kumuh_model->get_kawasan_dropdown__tingkat_kumuh($id_tk);
        
        if(isset($data['kawasan_dropdown__tingkat_kumuh']['id_tk']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'tingkat_kumuh' => $this->input->post('tingkat_kumuh'),
                );

                $this->Kawasan_dropdown__tingkat_kumuh_model->update_kawasan_dropdown__tingkat_kumuh($id_tk,$params);            
                redirect('kawasan_dropdown__tingkat_kumuh/index');
            }
            else
            {
                $data['_view'] = 'kawasan_dropdown__tingkat_kumuh/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The kawasan_dropdown__tingkat_kumuh you are trying to edit does not exist.');
    } 

    /*
     * Deleting kawasan_dropdown__tingkat_kumuh
     */
    function remove($id_tk)
    {
        $kawasan_dropdown__tingkat_kumuh = $this->Kawasan_dropdown__tingkat_kumuh_model->get_kawasan_dropdown__tingkat_kumuh($id_tk);

        // check if the kawasan_dropdown__tingkat_kumuh exists before trying to delete it
        if(isset($kawasan_dropdown__tingkat_kumuh['id_tk']))
        {
            $this->Kawasan_dropdown__tingkat_kumuh_model->delete_kawasan_dropdown__tingkat_kumuh($id_tk);
            redirect('kawasan_dropdown__tingkat_kumuh/index');
        }
        else
            show_error('The kawasan_dropdown__tingkat_kumuh you are trying to delete does not exist.');
    }
    
}