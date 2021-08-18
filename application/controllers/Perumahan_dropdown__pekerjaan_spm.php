<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Perumahan_dropdown__pekerjaan_spm extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Perumahan_dropdown__pekerjaan_spm_model');
    } 

    /*
     * Listing of perumahan_dropdown__pekerjaan_spm
     */
    function index()
    {
        $data['perumahan_dropdown__pekerjaan_spm'] = $this->Perumahan_dropdown__pekerjaan_spm_model->get_all_perumahan_dropdown__pekerjaan_spm();
        
        $data['_view'] = 'perumahan_dropdown__pekerjaan_spm/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new perumahan_dropdown__pekerjaan_spm
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'pekerjaan' => $this->input->post('pekerjaan'),
            );
            
            $perumahan_dropdown__pekerjaan_spm_id = $this->Perumahan_dropdown__pekerjaan_spm_model->add_perumahan_dropdown__pekerjaan_spm($params);
            redirect('perumahan_dropdown__pekerjaan_spm/index');
        }
        else
        {            
            $data['_view'] = 'perumahan_dropdown__pekerjaan_spm/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a perumahan_dropdown__pekerjaan_spm
     */
    function edit($id_pekerjaan_spm)
    {   
        // check if the perumahan_dropdown__pekerjaan_spm exists before trying to edit it
        $data['perumahan_dropdown__pekerjaan_spm'] = $this->Perumahan_dropdown__pekerjaan_spm_model->get_perumahan_dropdown__pekerjaan_spm($id_pekerjaan_spm);
        
        if(isset($data['perumahan_dropdown__pekerjaan_spm']['id_pekerjaan_spm']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'pekerjaan' => $this->input->post('pekerjaan'),
                );

                $this->Perumahan_dropdown__pekerjaan_spm_model->update_perumahan_dropdown__pekerjaan_spm($id_pekerjaan_spm,$params);            
                redirect('perumahan_dropdown__pekerjaan_spm/index');
            }
            else
            {
                $data['_view'] = 'perumahan_dropdown__pekerjaan_spm/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The perumahan_dropdown__pekerjaan_spm you are trying to edit does not exist.');
    } 

    /*
     * Deleting perumahan_dropdown__pekerjaan_spm
     */
    function remove($id_pekerjaan_spm)
    {
        $perumahan_dropdown__pekerjaan_spm = $this->Perumahan_dropdown__pekerjaan_spm_model->get_perumahan_dropdown__pekerjaan_spm($id_pekerjaan_spm);

        // check if the perumahan_dropdown__pekerjaan_spm exists before trying to delete it
        if(isset($perumahan_dropdown__pekerjaan_spm['id_pekerjaan_spm']))
        {
            $this->Perumahan_dropdown__pekerjaan_spm_model->delete_perumahan_dropdown__pekerjaan_spm($id_pekerjaan_spm);
            redirect('perumahan_dropdown__pekerjaan_spm/index');
        }
        else
            show_error('The perumahan_dropdown__pekerjaan_spm you are trying to delete does not exist.');
    }
    
}
